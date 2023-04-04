<?php
require_once '../verify.php';
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['name']) && isset($_POST['email'])
        && isset($_POST['password']) && isset($_POST['cpswd'])
        && isset($_POST['register'])
    ) {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        //validating email and storing error message in vaariable if incorrect
        if (!$name) {
            $error_msg = "Name is not valid";
        } else {
            //validating email and storing error message in vaariable if incorrect
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            if (!$email) {
                $error_msg = "Email is not valid";
            } else {
                $password = $_POST['password'];
                //then we will validate password with regular expressions if we got email correct
                if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/\d/', $password)) {
                    $error_msg = "Password not valid";
                } else {
                    $confirmPassword = $_POST['cpswd'];
                    //matching passwords
                    if ($confirmPassword !== $password) {
                        $error_msg = "Passwords do not match";
                    } else {
                        //running a query to see if the user already exists in the database by same email
                        $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
                        $statement->bindParam(':email', $email, PDO::PARAM_STR);
                        $statement->execute();
                        $row = $statement->fetch(PDO::FETCH_ASSOC);

                        if ($row) {
                            //we will diplay the eroor if a user found with same email
                            $error_msg = "Email already exists";
                        } else {
                            //if not. then creating password hash by calling passHash function from functions.php file
                            $pass_hash = passHash($password);
                            $query = $pdo->prepare("INSERT INTO users(username, email, password) VALUES (:name, :email, :password)");
                            $query->bindParam(':name', $name, PDO::PARAM_STR);
                            $query->bindParam(':email', $email, PDO::PARAM_STR);
                            $query->bindParam(':password', $pass_hash, PDO::PARAM_STR);
                            $query->execute();

                            //we will echo the error variable we created to display any potential error
                            if (isset($error_msg)) {
                                echo "<h4>$error_msg</h4>";
                            } else {
                                //if no error was found, then will display a friendly message to greet user
                                echo <<<_END
                            <h2>You have successfully been registered $name!</h2>
                            <a href="login.php">Login now</a>
                            _END;
                            }
                        }
                    }
                }
            }
        }
    } else {
        echo "<h4>Please fill the requirements</h4>";
    }
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

    <form action="signup.php" method="post">
        <div class="signup_img_container ">
            <img src="images/signup-image3.jpg" alt="stock image">
        </div>

        <div class="form_container">
            <h1>Sign Up</h1>
            <input type="text" class="field" id="username" name="name" placeholder="Your Name">
            <input type="email" class="field" id="pswd" name="email" placeholder="Your Email">
            <input type="password" class="field" id="pswd" name="password" placeholder="Your Password">
            <input type="password" class="field" id="pswd" name="cpswd" placeholder="Confirm Password">
            <label class="tos" for="tos">
                <input type="checkbox" check="checked" name='tos'>
                <span>I agree to all statements in <a class='txt-underline'>Terms of Services</a></span>
            </label>
            <button type="submit" class="field auth_btns" id="submit" name="register">Register</button>
            <!-- <span class='forgot_pswd'><a href="">Forgot Passowrd / Username?</a></span> -->
            <span class='forgot_pswd'>
                <P>Already have an account? <a href="login.php">login</a><i class="fa-sharp fa-regular fa-arrow-right-long"></i></P>
            </span>
        </div>
    </form>

</body>

</html>