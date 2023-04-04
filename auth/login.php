<?php
session_start();
//importing database conn file
require_once '../verify.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = $_POST['password'];
        //validating email and storing error message in vaariable if incorrect
        if (!$email) {
            $error_msg = "Invalid login credentials";
        } else {
            //then we will validate password with regular expressions if we got email correct
            if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/\d/', $password)) {
                $error_msg = "Invalid login credentials";
            } else {
                //then we will match the password using the passVerify() funtion from funtions.php file
                require_once 'functions.php';
                $verify = passVerify($pdo, $email, $password);
                if ($verify['success']) {
                    //creating session with user id if validation was succesfull
                    $_SESSION['user_id'] = $verify['user_id'];
                    session_regenerate_id();
                    //redirecting the user on index page after login
                    header('Location: ../index.php');
                    exit;
                } else {
                    $error_msg = "Invalid login credentials";
                }
            }
        }
    }
    //we will echo the error variable we created to display any potential error

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Login</title>
</head>

<body>

    <form action="login.php" method="post">
        <div class="form_container">
            <h1>Sign In</h1>
            <input type="email" class="field" id="email" name="email" placeholder="Your Email">
            <input type="password" class="field" id="password" name="password" placeholder="Your Password">
            <span style="color: red;"><?php     if (isset($error_msg)) {
        echo "<h4>$error_msg</h4>";
    } ?></span>
            <button type="submit" class="field auth_btns" id="submit" name="submit">Login</button>
            <span class='forgot_pswd'><a href="">Forgot Passowrd / Username?</a></span>
            <span class='signup'><a href="signup.php">Create an account</a><i class="fa-sharp fa-regular fa-arrow-right-long"></i></span>
        </div>

        <div class="img_container">
            <img src="images/14449322_5464026.jpg" alt="stock image">
        </div>

    </form>

</body>

</html>