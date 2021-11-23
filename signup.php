<?php
require("partials/header.php");
require("prefs/Credentials.php");

// $registerError = "";
$successMessage = "";
?>
<section class="content-signin">
    <div class="signup-form">
        <div class="signup-form-left">
            <h3>SIGN UP</h3>
            <form action="" method="post" class="register-form" id="register-form">
                <!-- Name -->
                <div class="signup-group">
                    <div class="input">
                        <i class="fas fa-user"></i>
                        <input type="text" name="name" id="name" placeholder="Name" required>
                    </div>
                    <hr>
                </div>
                <!-- Email -->
                <div class="signup-group">
                    <div class="input">
                        <i class="far fa-envelope"></i>
                        <input type="text" name="email" id="email" placeholder="Email" required>
                    </div>
                    <hr>
                </div>
                <!-- Password -->
                <div class="signup-group">
                    <div class="input">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                    <hr>
                    <input type="checkbox" onclick="showPassword()">Show Password
                </div>
                <!-- Confirm Password -->
                <div class="signup-group">
                    <div class="input">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="confirmedPassword" id="confirmedPassword" placeholder="Confirm password" required>
                    </div>
                    <hr>
                </div>
                <!-- Errors -->
                <p class="error-message" id="register-error"></p>
                <!-- Positives Feedback -->
                <p class="success-message"><?=$successMessage?></p>
                <!-- Button -->
                <button type="submit" name="submit" id="submit">SIGN UP</button>
            </form>
        </div>
        <div class="signup-form-right">
            <h3>Already signed up?</h3>
            <br>
            <h3>Welcome back!</h3>
            <a href="signin.php">SIGN IN</a>
        </div>
    </div>
</section>
<?php require('partials/footer.php'); ?>
<script>
/* Show Password */
function showPassword() {
    // Get Password
    let password = document.getElementById("password");
    // If password is type password show text
    if (password.type === "password") {
        password.type = "text";
    } else { // Else show text as type password
        password.type = "password";
    }
}

/* Ajax Submit */
const form = document.getElementById("register-form");
let output = document.getElementById("register-error");

// addEventListener on the whole form
form.addEventListener("submit", function(e){
    // Prevent the event from submitting the form, no redirect or page reload
    e.preventDefault();
    // Get the inputs and save them in a formattedData Object
    const formattedFormData = {
        name: this.name.value,
        email: this.email.value,
        password: this.password.value,
        confirmedPassword: this.confirmedPassword.value,
        submit: this.submit.value,
    }
    // Send it to function postData
    postData(formattedFormData);
});

async function postData(formattedFormData) {
    const response = await fetch("includes/validateRegistration.php", {
        // Method is post
        method: "POST",
        // Convert to JSON String
        body: JSON.stringify(formattedFormData)
    });
    // console.log(formattedFormData);
    // Save the response in const
    const data = await response.text();
    // console.log(data);
    // Show the response (error/success-message) in output field
    output.innerHTML = data;
}
</script>
<?php require('partials/bodytag.php'); ?>