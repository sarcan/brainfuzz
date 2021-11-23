<?php
ob_start();
// session_start();
/* $_SESSION["loggedIn"] = false;
print_r($_SESSION); */

// Requires
require("partials/header.php");
require("prefs/Credentials.php");
require("class/ErrorFunctions.php");
require("class/User.php");

// Instance the class
$checkForErrors = new ErrorFunctions;
$checkUser = new User($connection);

// $checkSession = $checkUser -> sessionIsValid($_SESSION["timeOfLogin"]);

// Errormessage
$errorMessage = "";

// Check if Form has been submitted
if (isset($_POST["submit"])) {
    // Sanitize Input
    $email = $checkForErrors -> desinfect($_POST["email"]);
    $password = $checkForErrors -> desinfect($_POST["password"]);

    // Are the form inputs filled out?
    if (empty($email) || empty($password)) {
        $errorMessage = "<p class=\"error-message\">Please enter your Email & Password</p>\n";
    } else {
        // If the fields are filled out, call function loginUser from User Class
        $checkLogin = $checkUser -> loginUser($email);
        // If the email couldn't be found display error message
        if (!$checkLogin) {
            $errorMessage = "<p class=\"error-message\">User not found!</p>\n";
        } else {
            // var_dump($checkLogin);
            // Check if the entered password is matching the password in the db
            if (password_verify($password, $checkLogin["password"])) {
                // Current Session loggedIn should be true
                $_SESSION["loggedIn"] = true;
                $_SESSION["timeOfLogin"] = time();
                $_SESSION["userid"] = $checkLogin["id"];
                $_SESSION["email"] = $checkLogin["email"];
                header("Location: myaccount.php");
                exit;
            } else {
                // If password is wrong display error message
                $errorMessage = "<p class=\"error-message\">Wrong Password!</p>\n";
            }
        }
    }
} else {
    // If nothing has been entered the email and password field should be empty
    $email = "";
    $password = "";
}
ob_end_flush();
?>
<section class="content-signin">
    <div class="login-form">
        <div class="form-left">
            <h3>SIGN IN</h3>
            <form action="" method="post">
                <!-- Email -->
                <div class="signin-group">
                    <div class="input">
                        <i class="fas fa-user"></i>
                        <input type="text" name="email" id="email" placeholder="Email" required>
                    </div>
                    <hr>
                </div>
                <!-- Password -->
                <div class="signin-group">
                    <div class="input">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                    <hr>
                    <input type="checkbox" onclick="showPassword()" id="checkbox">Show Password
                </div>
                <!-- Error Messages -->
                <?php if ($errorMessage) : ?>
                    <p class="error-message"><?=$errorMessage?></p>
                <?php endif; ?>
                <!-- Button -->
                <button type="submit" name="submit">SIGN IN</button>
            </form>
        </div>
        <div class="form-right">
            <h3>Start your journey with us</h3>
            <a href="signup.php">SIGN UP</a>
        </div>
    </div>
</section>
<?php require('partials/footer.php'); ?>
<script>
// Show Password
function showPassword() {
    let password = document.getElementById("password");
    if (password.type === "password") {
        password.type = "text";
    } else {
        password.type = "password";
    }
}
</script>
<?php require('partials/bodytag.php'); ?>