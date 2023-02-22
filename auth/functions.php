<?php
require_once '../verify.php';
//Function to password hash
function passHash($password)
{
    $pass = password_hash($password, PASSWORD_ARGON2ID);
    return $pass;
}
//Funtion to verify password hash from database
function passVerify($pdo, $email, $password)
{
    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            //returning success string and user id for session if entered password matches with daatabase  
            return array('success' => true, 'user_id' => $user['user_id']);
        } else {
            return array('success' => false);
        }
    } catch (PDOException $e) {
        throw new Exception("Error verifying password: " . $e->getMessage());
    }
}
