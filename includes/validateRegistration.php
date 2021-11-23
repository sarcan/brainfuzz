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
    $name = $checkForErrors -> desinfect($data['name']);
    $email = $checkForErrors -> desinfect($data['email']);
    $password = $checkForErrors -> desinfect($data['password']);
    $confirmedPassword = $checkForErrors -> desinfect($data['confirmedPassword']);

    // Check if the name has an input
    // If it doesn't, display Error Message
    $checkName = $checkForErrors -> hasInput($name);
    if (!$checkName) {
        echo "<p>Please add your name.<br></p>";
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

    // Check if the password and the confirmed Password are the same
    $comparePasswords = $checkForErrors -> comparePasswords($password, $confirmedPassword);
    if (!$comparePasswords) {
        echo $checkForErrors -> errormessages;
    }

    // Check the length of the Password
    $checkPassword = $checkForErrors -> passwordLength($password);
    if (!$checkPassword) {
        echo $checkForErrors -> errormessages;
    }

    // Hash Password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if Email or Username is already in the Database
    $dbName = $checkUser -> checkName($name);
    $dbEmail = $checkUser -> checkEmail($email);
    if ($dbName || $dbEmail) {
        echo "<p class=\"success-message\">The entered email adress or name already exists!</p>\n";
    }

    if ($checkName && $lengthName && $checkEmail && $comparePasswords && $checkPassword) {
        if (!$dbName && !$dbEmail /* && !$checkForError -> errormessages */) {
            $checkUser -> register([
                "name" => $name,
                "email" => $email,
                "password" => $hashedPassword
            ]);
            echo "<p class=\"success-message\">You are registered! Sign in <a href=\"signin.php\">here</a></p>\n";
        } else {
            echo "<p class=\"error-message\">Could not register!</p>\n"; 
        }
    } else {
        echo "<p class=\"error-message\">Could not register!</p>\n"; 
    }

}

?>