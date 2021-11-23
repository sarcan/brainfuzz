<?php
session_start();
// Requires
require("../class/ErrorFunctions.php");
require("../prefs/Credentials.php");

// Instance the Class
$checkForErrors = new ErrorFunctions;

$data = json_decode(file_get_contents('php://input'), true);

// Check Form
if (isset($_POST)) {
    $name = $checkForErrors -> desinfect($data["name"]);
    $email = $checkForErrors -> desinfect($data["email"]);
    $message = $checkForErrors -> desinfect($data["message"]);

    // Check if the name has an input
    // If it doesn't, display Error Message
    $checkName = $checkForErrors -> hasInput($name);
    if (!$checkName) {
        echo "<p>Please enter your name.<br></p>";
    }

    $checkMessage = $checkForErrors -> hasInput($message);
    if (!$checkName) {
        echo "<p>Please enter your message.<br></p>";
    }

    // Check amount of Characters
    $lengthName = $checkForErrors -> checkLength($name);
    if (!$lengthName) {
        echo $checkForErrors -> errormessages;
    }

    $lengthMessage = $checkForErrors -> checkLength($message);
    if (!$lengthMessage) {
        echo $checkForErrors -> errormessages;
    }

    // Check Email
    $checkEmail = $checkForErrors -> validateEmail($email);
    if (!$checkEmail) {
        echo $checkForErrors -> errormessages;
    }

    if ($checkName && 
        $checkMessage && 
        $lengthName && 
        $lengthMessage && 
        $checkEmail) {
            // Create the email and send the message
            $to = 'message@brainfuzz.com'; // This is where the form will send a message to.
            $email_subject = "Website Contact Form: $name";
            $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email\n\nMessage:\n$message";
            $headers = "From: noreply@brainfuzz.com\n"; // This is the email address the generated message will be from.
            $headers .= "Reply-To: $email";   
            mail($to,$email_subject,$email_body,$headers);

            echo "<p>Your message has been sent.<br></p>";
    } else {
        echo "<p>Could not send message.<br></p>";
    }
} else {
    echo "<p>Something went wrong.</p>";
}

?>