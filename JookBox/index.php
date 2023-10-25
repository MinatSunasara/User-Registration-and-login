<?php
require 'include/connection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Signup and login</title>
</head>

<body>
    <?php require "include/submit.php" ?>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="#" method="POST" id="signUpForm">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fa fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="social"><i class="fa fa-linkedin-square"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" placeholder="Name" name="name" />
                <div class="error" style="color:red; font-size:10px;"><?php echo $nameerror; ?></div>
                <input type="email" placeholder="Email" name="email" />
                <div class="error" style="color:red;font-size:10px;"><?php echo $emailerror; ?></div>
                <input type="password" placeholder="Password" name="psw" />
                <div class="error" style="color:red;font-size:10px;"><?php echo $passworderror; ?></div>
                <input type="address" placeholder="address" name="address" />
                <input type="mobile" placeholder="Mobile" name="mobile" onkeyup="val(this)" />
                <div class="error" style="color:red;font-size:10px;" id="res"><?php echo $mobilerror; ?></div>
                <button name="signup" type="submit">Sign Up</button>
            </form>
        </div>

        <div class="form-container sign-in-container">

            <form action="#" method="POST">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fa fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="social"><i class="fa fa-linkedin-square"></i></a>
                </div>
                <span>or use your account</span>
                <input type="email" placeholder="Email" name="email" />
                <input type="password" placeholder="Password" name="psw" />
                <a href="#">Forgot your password?</a>
                <button name="signin">Sign In</button>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script>
    function val(elem) {
        if (isNaN(elem.value)) {
            document.getElementById('res').innerText = "Please Enter Numbers Only";
        } else {
            document.getElementById('res').innerText = "";
            if (elem.value.length > 10) {
                document.getElementById('res').innerText = "Please Enter 10 digits Mobile number";
            } else {
                document.getElementById('res').innerText = "";
            }
        }

    }
    </script>
    <script src="assets/script.js"></script>

</body>

</html>