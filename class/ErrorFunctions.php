<?php
// Class for all Error Messages

class ErrorFunctions {
    /* Error / Success Messages */
    public $errormessages;
    public $successmessages;

    /* Are all fields filled out? */
    // If the field is not empty, return the component.
    // Else send a Error Message.
    public function hasInput($input) {
        if (!empty(trim($input))) {
            return $input;
        } else {
            return false;
        }
    }

    /* Desinfect the user input */
    // Remove Whitespaces.
    // Remove Escape characters.
    // Filter variables.
    // Remove HTML- and PHP-Tags.
    // Convert Special Characters.
    // Return the String.
    public function desinfect($input) {
        $input = trim($input);  
        $input = stripslashes($input);
        $input = filter_var($input, FILTER_SANITIZE_STRING); 
        $input = strip_tags($input); 
        $input = htmlspecialchars($input);
        return $input;
    }

    /* Decrypt String */
    // Convert HTML-Entities.
    // Convert HTML-Special-Characters to letters.
    // Return String.
    public function decrypt($input) {
        $input = html_entity_decode($input);
        $input = htmlspecialchars_decode($input);
        return $input;
    }

    /* Input is too short/long */
    // Check if the length of the input is less than 2 characters or more than 25. If this is the case send an error message.
    // Else return true.
    public function checkLength($input) {
        if (strlen($input) < 2 || strlen($input) > 55) {
            $this -> errormessages = "Please enter at least 2 characters and no more than 55. <br>";
            return false;
        }
        return true;
    }

    /* Input is too short */
    // Check if the length of the input is less than 2 characters or more than 25. If this is the case send an error message.
    // Else return true.
    public function checkMinLength($input) {
        if (strlen($input) < 2) {
            $this -> errormessages = "Please enter at least 2 characters. <br>";
            return false;
        }
        return true;
    }

    /* Validate Email */
    // If there isn't any input, return false.
    // If the user didn't input a valid email, return false.
    // Else return true.
    public function validateEmail($input) {
        if (!isset($input)) {
            return false;
        } if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
            $this -> errormessages = "The email adress you've entered is not valid. <br>";
            return false;
        }
        return true;
    }

    /* Check if the password is long enough */
    // Is the Password isn't between 8 and 20 characters long return false.
    // Else return true.
    public function passwordLength ($input) {
        if (strlen($input) > 20 || strlen($input) < 8) {
            $this -> errormessages = "The Passwort must be between 8 and 20 characters long. <br>";
            return false;
        }
        return true;
    }

    /* Check if the entered Passwords are the same */
    // Compare the two inputs to eachother.
    // If everything is correct return true.
    public function comparePasswords ($input1, $input2) {
        if ($input1 !== $input2) {
            $this -> errormessages = "Unfortunately the passwords you've entered aren't matching. <br>";
            return false;
        } else {
            return true;
        }
    }

    public function compareNewToOld ($oldPassword, $newPassword) {
        if ($oldPassword === $newPassword) {
            return false;
            $this -> errormessages = "Sorry, your new password has to be different from your old one. <br>";
        } else {
            return true;
        }
    }
}
?>