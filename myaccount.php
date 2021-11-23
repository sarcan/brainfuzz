<?php
// Requires
require('partials/header.php');
require("class/ErrorFunctions.php");
require("class/User.php");
require("prefs/credentials.php");

// Get ID
$id = $_SESSION["userid"];

// Get the Name of the User
// If loggedIn is true
// Instance Class
// Call method getData
if ($_SESSION["loggedIn"] == true) {
    $information = new User($connection);
    $getInformation = $information -> getData($id);
} else {
    // If it didn't work, redirect to signin.php
    header("Location: signin.php");
    /* Maybe Errormessage? */
}

$registerError = "";
$successMessage = "";

?>
<section class="content">
    <div class="profile-settings">
        <h3>Welcome back, <?= $getInformation["name"]?> 👋</h3>
        <form action="" method="post" class="update-form" id="update-form">
            <input type="hidden" for="id" id="id" class="hide-id" value="<?php print_r($getInformation["id"]) ?>"></input>
            <!-- Name -->
            <div class="group">
                <div class="input">
                    <p>👤</p>
                    <input type="text" name="name" id="name" placeholder="Name" value="<?= $getInformation["name"] ?>">
                </div>
            </div>
            <!-- Email -->
            <div class="group">
                <div class="input">
                    <p>📧</p>
                    <input type="text" name="email" id="email" placeholder="Email" value="<?= $getInformation["email"] ?>">
                </div>
            </div>
            <!-- Errors -->
            <p class="error-message" id="update-error"></p>
            <!-- Button -->
            <button type="submit" name="save" id="save">SAVE</button>
        </form>

        <button class="logout-btn">
            <a href="logout.php">Logout</a>
        </button>
    </div>
</section>
<?php require('partials/footer.php'); ?>
<script>
/* Ajax Submit */
const form = document.getElementById("update-form");
let ausgabe = document.getElementById("update-error");

// addEventListener on the whole form
form.addEventListener("submit", function(e) {
    //Prevent the event from submitting the form, no redirect or page reload
    e.preventDefault();
    // Get the inputs and save them in a formattedData Object  
    const formattedFormData = {
        id: this.id.value,
        name: this.name.value,
        email: this.email.value,
        submit: this.submit.value,
    }
    // Send it to function postData
    postData(formattedFormData);
});

async function postData(formattedFormData) {
    const response = await fetch("includes/updateMyAccount.php", {
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
    ausgabe.innerHTML = data;
}
</script>
<?php require('partials/bodytag.php'); ?>