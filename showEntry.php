<?php
/* Requires */
require("partials/header.php"); 
require("class/Journal.php");
require("prefs/Credentials.php");

$journalInstance = new Journal($connection);

// Get ID from the journal entry
if (!isset($_GET["id"])) {
    header("journal.php");
    exit;
} else {
    // Save the ID in variable
    $journalEntryId = filter_var($_GET["id"], FILTER_SANITIZE_STRING);
    // Get specific Journal entry
    $getSpecificJournalEntry = $journalInstance -> getEntry($journalEntryId);
}
?>
<section class="content">

<div id="journal-filled">
    <h2 class="title"><?=date("l - d.m.Y", strtotime($getSpecificJournalEntry["date"]));?></h2>
    <div class="left-side">
        <!-- Goals -->
        <div class="group">
            <h3 class="p">Goals:</h3>
            <div id="list-of-goals">
                <p><span>🎯</span> <?=$getSpecificJournalEntry["firstGoal"]?></p>
                <p><span>🎯</span> <?=$getSpecificJournalEntry["secondGoal"]?></p>
                <p><span>🎯</span> <?=$getSpecificJournalEntry["thirdGoal"]?></p>
            </div>
        </div>
        <!-- Summary -->
        <div class="group">
            <h3>Summary of your achievements: </h3>
            <p><?=$getSpecificJournalEntry["summary"]?></p>
        </div>
        <!-- Most important Task -->
        <div class="group">
            <h3>Your most important task was: </h3>
            <p><?=$getSpecificJournalEntry["importantTask"]?></p>
        </div>
    </div>

    <div class="right-side">
        <!-- What went well -->
        <div class="group">
            <h3>What went well:</h3>
            <p><?=$getSpecificJournalEntry["wentWell"]?></p>
        </div>
        <!-- Do better -->
        <div class="group">
            <h3>Do better: </h3>
            <p><?=$getSpecificJournalEntry["doBetter"]?></p>
        </div>
        <!-- Ideas -->
        <div class="group">
            <h3>Ideas</h3>
            <p><?=$getSpecificJournalEntry["ideas"]?></p>
        </div>
    </div>

    <div class="bottom-side-left">
        <h3>You rated your day the following: </h3>
        <!-- Sleep -->
        <div class="group">
            <h4>Sleep</h4>
            <p><?=$getSpecificJournalEntry["sleep"]?> Stars <i class="fas fa-star"></i></p>
        </div>
        <!-- Mood -->
        <div class="group">
            <h4>Mood</h4>
            <p><?=$getSpecificJournalEntry["mood"]?> Stars <i class="fas fa-star"></i></p>
        </div>
        <!-- Motivation -->
        <div class="group">
            <h4>Motivation</h4>
            <p><?=$getSpecificJournalEntry["motivation"]?> Stars <i class="fas fa-star"></i></p>
        </div>
        <!-- Concentration -->
        <div class="group">
            <h4>Concentration</h4>
            <p><?=$getSpecificJournalEntry["concentration"]?> Stars <i class="fas fa-star"></i></p>
        </div>
        <!-- Tranquility -->
        <div class="group">
            <h4>Tranquility</h4>
            <p><?=$getSpecificJournalEntry["tranquility"]?> Stars <i class="fas fa-star"></i></p>
        </div>
        <!-- Physical -->
        <div class="group">
            <h4>Physical Well-bein</h4>
            <p><?=$getSpecificJournalEntry["physical"]?> Stars <i class="fas fa-star"></i></p>
        </div>
    </div>

    <!-- Errors -->
    <div class="bottom-side-right">
        <!-- Output -->
        <p class="journal-output" id="journal-output"></p>
        <!-- Errors -->
        <p class="error-message" id="error-message"></p>
    </div>
</div>
<a href="journal.php" class="backtoentry">Back to Journal Entries</a>
</section>

<?php require('partials/footer.php'); ?>
<?php require('partials/bodytag.php'); ?>