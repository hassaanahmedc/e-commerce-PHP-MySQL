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
        <div class="form_container">
            <h1>Sign In</h1>
            <input type="text" class="field" id="username" name="username" placeholder="Your Username">
            <input type="password" class="field" id="pswd" name="pswd" placeholder="Your Password">
            <button type="submit" class="field btn" id="submit" name="submit">Login</button>
            <span class='forgot_pswd'><a href="">Forgot Passowrd / Username?</a></span>
            <span class='signup'><a href="signup.php">Create an account</a><i class="fa-sharp fa-regular fa-arrow-right-long"></i></span>
        </div>

    <div class="img_container">
        <img src="images/14449322_5464026.jpg" alt="stock image">
    </div>
        
    </form>
    
</body>
</html>