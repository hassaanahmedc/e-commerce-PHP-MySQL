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

    <form action="functions.php" method="post">
        <div class="signup_img_container ">
            <img src="images/signup-image3.jpg" alt="stock image">
        </div>

        <div class="form_container">
            <h1>Sign Up</h1>
            <input type="text" class="field" id="username" name="username" placeholder="Your Name">
            <input type="password" class="field" id="pswd" name="pswd" placeholder="Your Email">
            <input type="password" class="field" id="pswd" name="pswd" placeholder="Your Password">
            <input type="password" class="field" id="pswd" name="pswd" placeholder="Confirm Password">
            <label class = "tos" for="tos">
                <input type="checkbox" check="checked" name='tos'>
                <span>I agree to all statements in <a class='txt-underline'>Terms of Services</a></span>
            </label>
            <button type="submit" class="field btn" id="submit" name="submit">Register</button>
            <!-- <span class='forgot_pswd'><a href="">Forgot Passowrd / Username?</a></span> -->
            <span class='forgot_pswd'><P>Already have an account? <a href="login.php">login</a><i class="fa-sharp fa-regular fa-arrow-right-long"></i></P></span>
        </div>
    </form>

</body>

</html>