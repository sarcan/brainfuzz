<?php
session_start();
// Requires
require("../class/ErrorFunctions.php");
require("../class/Journal.php");
require("../prefs/Credentials.php");

// Instance the class
$checkForErrors = new ErrorFunctions;
$checkJournal = new Journal($connection);

$id = $_SESSION["userid"];
$email = $_SESSION["email"];
$data = json_decode(file_get_contents('php://input'), true);
// print_r($data);

// Check if the button has been clicked
if (isset($_POST)) {
    $firstGoal = $checkForErrors -> desinfect($data['firstGoal']);
    $secondGoal = $checkForErrors -> desinfect($data['secondGoal']);
    $thirdGoal = $checkForErrors -> desinfect($data['thirdGoal']);
    $importantTask = $checkForErrors -> desinfect($data['importantTaskField']);
    $sliderValueSleep = $checkForErrors -> desinfect($data['sliderValueSleep']);

    // Check if the fields have input
    // First Goal
    $checkFirstGoal = $checkForErrors -> hasInput($firstGoal);
    if (!$checkFirstGoal) {
        echo "<p>Please add your first goal.<br></p>";
    }
    // Second Goal
    $checkSecondGoal = $checkForErrors -> hasInput($secondGoal);
    if (!$checkSecondGoal) {
        echo "<p>Please add your second goal.<br></p>";
    }
    // Third Goal
    $checkThirdGoal = $checkForErrors -> hasInput($thirdGoal);
    if (!$checkThirdGoal) {
        echo "<p>Please add your third goal.<br></p>";
    }
    // Important Task
    $checkImportantTask = $checkForErrors -> hasInput($importantTask);
    if (!$checkImportantTask) {
        echo "<p>Please add your most important task.<br></p>";
    }
    // Slider Value
    $checkSliderValueSleep = $checkForErrors -> hasInput($sliderValueSleep);
    if (!$checkSliderValueSleep) {
        echo "<p>Please rate your sleep from 1 to 5 (1 being worst, 5 being best).<br></p>";
    }

    // Check the length of the inputs
    // First Goal
    $lengthFirstGoal = $checkForErrors -> checkLength($firstGoal);
    if (!$lengthFirstGoal) {
        echo "First Goal: " . $checkForErrors -> errormessages;
    }
    // Second Goal
    $lengthSecondGoal = $checkForErrors -> checkLength($secondGoal);
    if (!$lengthSecondGoal) {
        echo "Second Goal: " . $checkForErrors -> errormessages;
    }
    // Third Goal
    $lengthThirdGoal = $checkForErrors -> checkLength($thirdGoal);
    if (!$lengthThirdGoal) {
        echo "Third Goal: " . $checkForErrors -> errormessages;
    }
    // Important Task
    $lengthImportantTask = $checkForErrors -> checkMinLength($importantTask);
    if (!$lengthImportantTask) {
        echo "Important Task: " . $checkForErrors -> errormessages;
    }

    if (
        $checkFirstGoal && 
        $checkSecondGoal &&
        $checkThirdGoal &&
        $checkImportantTask && 
        $checkSliderValueSleep &&
        $lengthFirstGoal &&
        $lengthSecondGoal &&
        $lengthThirdGoal &&
        $lengthImportantTask )
        {
        $checkJournal -> newJournalEntry([
            "currentDate" => date('Y-m-d H:i:s'),
            "firstGoal" => $firstGoal,
            "secondGoal" => $secondGoal,
            "thirdGoal" => $thirdGoal,
            "importantTask" => $importantTask,
            "sliderValueSleep" => $sliderValueSleep,
            "userId" => $id
        ]);
        echo "<p class=\"success-message\">Journal Entry successfully saved</p>\n";
    } else {
        echo "<p class=\"error-message\">Could not save!</p>\n"; 
    }
} else {
    echo "<p class=\"error-message\">Could not save!</p>\n"; 
}
?>