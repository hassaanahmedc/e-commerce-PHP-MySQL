<?php
session_start();
require_once 'verify.php';
require_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/contact.css">
    <title>Contact Us</title>
    <header>
        <div class="nav_container">
            <?php navbar() ?>
        </div>

        <div class="img_container">
            <img class='contact-img img1' src="header_imgs/contact.jpg" alt="imgae1">
            <!-- <img class="hero-img img2" src="header_imgs/img1.jpg" alt="imgae2"> -->
            <!-- <img class='hero-img img3' src="header_imgs/img3.jpg" alt="imgae3"> -->
            <!-- <img class='hero-img img4' src="header_imgs/img4.jpg" alt="imgae4"> -->
            <div class="headertxt">
                <h1 class="headertxt1">Contact Us</h1>
                <p class="headertxt2">We are here to assist you!</p>
            </div>
        </div>
    </header>

</head>

<body>
    <main class="main-content">
        <div class="containter">
            <form action="contact_us.php" action="post">

                <div class="form-field">
                    <label for="user_name">Name</label>
                    <input type="text" class="field" name="user_name" value="" required>
                </div>
                
                <div class="form-field">
                    <label for="email">Email</label>
                    <input type="email" class="field" name="email" value="" required>
                </div>
                
                <div class="form-field">
                    <label for="subject">Subject</label>
                    <input type="text" class="field" name="subject" value="" required>
                </div>

                <div class="form-field">
                    <label for="message">Message</label>
                    <textarea name="message" class="field" value="" required></textarea>
                </div>

                <div class="form-field">
                    <button type="submit" class="field submit-btn" name="submit" id="">Submit</button>
                </div>
            </form>
        </div>

    </main>
</body>

</html>