<?php
// Requires
require("../class/ErrorFunctions.php");
require("../class/User.php");
require("../prefs/Credentials.php");

// Instance the class
$checkForErrors = new ErrorFunctions;
$checkUser = new User($connection);

$data = json_decode(file_get_contents('php://input'), true);
// print_r($data);

// Check if button has been clicked
if (isset($_POST)) {
    // Clean the inputs
    $id = $checkForErrors -> desinfect($data["id"]);
    $name = $checkForErrors -> desinfect($data["name"]);
    $email = $checkForErrors -> desinfect($data["email"]);

    // Check if the name has an input
    // If it doesn't, display Error Message
    $checkName = $checkForErrors -> hasInput($name);
    if (!$checkName) {
        echo "<p>Please enter your name.<br></p>";
    }

    // Check amount of Characters
    $lengthName = $checkForErrors -> checkLength($name);
    if (!$lengthName) {
        echo $checkForErrors -> errormessages;
    }

    // Check Email
    $checkEmail = $checkForErrors -> validateEmail($email);
    if (!$checkEmail) {
        echo $checkForErrors -> errormessages;
    }

    if ($checkName && $lengthName && $checkEmail) {
            $checkUser -> updateAccount(
                $name,
                $email,
                $id
            );
            echo "<p class=\"success-message\">Your account has been updated.</p>\n";
        } else {
            echo "<p class=\"error-message\">Could not save!</p>\n"; 
        }
    } else {
    die("Something went wrong");
}
?>