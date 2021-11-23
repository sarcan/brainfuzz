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

// $journalEntryId = (int)$_GET["id"];
// // $journalEntryId = filter_var($_POST["id"], FILTER_SANITIZE_STRING);
// print_r($journalEntryId);
// Has the button been clicked?
if (isset($_POST)) {
    $journalId = $checkForErrors -> desinfect($data["id"]);
    $summaryField = $checkForErrors -> desinfect($data["summaryField"]);
    $wentWellField = $checkForErrors -> desinfect($data["wentWellField"]);
    $doBetterField = $checkForErrors -> desinfect($data["doBetterField"]);
    $ideasField = $checkForErrors -> desinfect($data["ideasField"]);
    $sliderValueMood = $checkForErrors -> desinfect($data["sliderValueMood"]);
    $sliderValueMotivation = $checkForErrors -> desinfect($data["sliderValueMotivation"]);
    $sliderValueConcentration = $checkForErrors -> desinfect($data["sliderValueConcentration"]);
    $sliderValueTranquility = $checkForErrors -> desinfect($data["sliderValueTranquility"]);
    $sliderValuePhysical = $checkForErrors -> desinfect($data["sliderValuePhysical"]);

    // Check if the fields have input
    // Summary
    $checkSummary = $checkForErrors -> hasInput($summaryField);
    if (!$checkSummary) {
        echo "<p>Please summarize your achievements.<br></p>";
    }
    // Went Well Field
    $checkWentWellField = $checkForErrors -> hasInput($wentWellField);
    if (!$checkWentWellField) {
        echo "<p>Please sum up, what went well.<br></p>";
    }
    // Do Better Field
    $checkDoBetterField = $checkForErrors -> hasInput($doBetterField);
    if (!$checkDoBetterField) {
        echo "<p>Please recap on what you could do better.<br></p>";
    }
    // Ideas Field
    $checkIdeasField = $checkForErrors -> hasInput($ideasField);
    if (!$checkIdeasField) {
        echo "<p>Please fill out the field for ideas.<br></p>";
    }
    // Slider Value Mood
    $checkSliderValueMood = $checkForErrors -> hasInput($sliderValueMood);
    if (!$checkSliderValueMood) {
        echo "<p>Please rate your mood from 1 to 5 (1 being worst, 5 being best).<br></p>";
    }
    // Slider Value Motivation
    $checkSliderValueMotivation = $checkForErrors -> hasInput($sliderValueMotivation);
    if (!$checkSliderValueMotivation) {
        echo "<p>Please rate your motivation from 1 to 5 (1 being worst, 5 being best).<br></p>";
    }
    // Slider Value Concentration
    $checkSliderValueConcentration = $checkForErrors -> hasInput($sliderValueConcentration);
    if (!$checkSliderValueConcentration) {
        echo "<p>Please rate your concentration from 1 to 5 (1 being worst, 5 being best).<br></p>";
    }
    // Slider Value Tranquility
    $checkSliderValueTranquility = $checkForErrors -> hasInput($sliderValueTranquility);
    if (!$checkSliderValueTranquility) {
        echo "<p>Please rate your tranquility from 1 to 5 (1 being worst, 5 being best).<br></p>";
    }
    // Slider Value Physical
    $checkSliderValuePhysical = $checkForErrors -> hasInput($sliderValuePhysical);
    if (!$checkSliderValuePhysical) {
        echo "<p>Please rate your physical from 1 to 5 (1 being worst, 5 being best).<br></p>";
    }

    // Check the length of the inputs
    // Third Goal
    $lengthSummary = $checkForErrors -> checkLength($summaryField);
    if (!$lengthSummary) {
        echo "Summarize your achievements: " . $checkForErrors -> errormessages;
    }
    // Went Well Field
    $lengthWentWellField = $checkForErrors -> checkMinLength($wentWellField);
    if (!$lengthWentWellField) {
        echo "Went well: " . $checkForErrors -> errormessages;
    }
    // Do Better Field
    $lengthDoBetterField = $checkForErrors -> checkMinLength($doBetterField);
    if (!$lengthDoBetterField) {
        echo "Do better: " . $checkForErrors -> errormessages;
    }
    // Important Task
    $lengthIdeasField = $checkForErrors -> checkMinLength($ideasField);
    if (!$lengthIdeasField) {
        echo "Ideas: " . $checkForErrors -> errormessages;
    }

    if (
        $checkSummary &&
        $checkWentWellField &&
        $checkDoBetterField &&
        $checkIdeasField &&
        $checkSliderValueMood &&
        $checkSliderValueMotivation &&
        $checkSliderValueConcentration &&
        $checkSliderValueTranquility &&
        $checkSliderValuePhysical &&
        $lengthSummary &&
        $lengthWentWellField &&
        $lengthDoBetterField &&
        $lengthIdeasField
    ) {
        $checkJournal -> updateJournal(
            $summaryField,
            $wentWellField,
            $doBetterField,
            $ideasField,
            $sliderValueMood,
            $sliderValueMotivation,
            $sliderValueConcentration,
            $sliderValueTranquility,
            $sliderValuePhysical,
            $journalId
        );
        echo "<p class=\"success-message\">Journal Entry successfully saved <br><a href=\"journal.php\" class=\"backtoentry\">Back to Journal Entries</a></p>\n";
    } else {
        echo "<p class=\"error-message\">Could not save!</p>\n"; 
    }
} else {
    die("Something went wrong");
}
?>