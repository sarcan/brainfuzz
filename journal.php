<?php
/* Requires */
require("partials/header.php"); 
require("class/Journal.php");
require("prefs/Credentials.php");

/* Get ID and Email of the logged in User */
$userId = $_SESSION["userid"];
$email = $_SESSION["email"];
// print_r($id);
// print_r($_SESSION);

/* Get all Journals */
$journalInstance = new Journal($connection);
$getJournalEntries = $journalInstance -> getJournalEntries($userId);
// var_dump($getJournalEntries["data"]);
?>
<section class="content">
    <h2>JOURNAL</h2>

    <div class="journal">
        <?php if ($getJournalEntries["status"]) {
        $alreadyFilledOut = false;
        $notFilledOutYet = false;

        foreach ($getJournalEntries["data"] as $journalEntry) { ?>
        <?php
            $date = date("Y-m-d");
            $dbdate = date("Y-m-d", strtotime($journalEntry["date"]));

            if( $date === $dbdate ) {
                $alreadyFilledOut = true;
                $notFilledOutYet = false;
            ?>
        <?php }  else {
                    $alreadyFilledOut = false;
                    $notFilledOutYet = true;
                } ?>
        <?php }
        if ($alreadyFilledOut) { ?> <!-- If form is already filled out show message -->
        <h3><?= date("l, d.m.Y") ?></h3>

        <p class="filledOut">You have already filled out today's journal 📋 <br> Don't forget to come back at the end of
            the day to <span>complete today's journal</span> 🖊️</p>
        <?php } elseif ($notFilledOutYet) { ?> <!-- If it hasn't been filled out show form -->
        <h3><?= date("l, d.m.Y") ?></h3>

        <form action="" method="post" id="journal-entry">
            <!-- Left Side -->
            <div class="left-side">
                <div class="group">
                    <label for="achieve">What do I want to achieve today?</label>
                    <div class="goal-group">
                        <label for="First Goal">First goal:</label>
                        <input type="text" name="firstGoal" id="firstGoal">
                    </div>
                    <div class="goal-group">
                        <label for="Second Goal">Second goal:</label>
                        <input type="text" name="secondGoal" id="secondGoal">
                    </div>
                    <div class="goal-group">
                        <label for="Third Goal">Third goal:</label>
                        <input type="text" name="thirdGoal" id="thirdGoal">
                    </div>
                </div>
                <div class="group">
                    <label for="importantTask">What is my most important task?</label>
                    <textarea name="importantTask" id="importantTask" cols="30" rows="5"></textarea>
                </div>
            </div>
            <!-- Right Side -->
            <div class="right-side">
                <div class="range-slider" id="range-slider">
                    <p class="range" id="range">Please rate from 1 to 5 how satisfied you were in the following area</p>
                    <div class="range-group">
                        <p>Sleep</p>
                        <input class="range-slider__range" id="range-slider__range" type="range" value="0" min="0"
                            max="5" step="1">
                        <output class="rangeslider__value sliderValueSleep" id="rangeslider__value"
                            id="sliderValueSleep">0</output>
                    </div>
                </div>
            </div>
            <div class="bottom-part">
                <!-- Output -->
                <p class="journal-output" id="journal-output"></p>
                <!-- Errors -->
                <p class="error-message" id="register-error"></p>
                <!-- Button -->
                <button type="submit" name="submit" id="submit">Save</button>
                <p class="complete-message">Don’t forget to complete your form tonight as you look back on your day.</p>
            </div>
        </form>
        <?php }
    }  else { ?> <!-- If it has never been filled out show message -->
        <h3><?= date("l, d.m.Y") ?> - Fill out your first journal entry!</h3>
        <form action="" method="post" id="journal-entry">
            <!-- Left Side -->
            <div class="left-side">
                <div class="group">
                    <label for="achieve">What do I want to achieve today?</label>
                    <div class="goal-group">
                        <label for="First Goal">First goal:</label>
                        <input type="text" name="firstGoal" id="firstGoal">
                    </div>
                    <div class="goal-group">
                        <label for="Second Goal">Second goal:</label>
                        <input type="text" name="secondGoal" id="secondGoal">
                    </div>
                    <div class="goal-group">
                        <label for="Third Goal">Third goal:</label>
                        <input type="text" name="thirdGoal" id="thirdGoal">
                    </div>
                </div>
                <div class="group">
                    <label for="importantTask">What is my most important task?</label>
                    <textarea name="importantTask" id="importantTask" cols="30" rows="5"></textarea>
                </div>
            </div>
            <!-- Right Side -->
            <div class="right-side">
                <div class="range-slider" id="range-slider">
                    <p class="range" id="range">Please rate from 1 to 5 how satisfied you were in the following area</p>
                    <div class="range-group">
                        <p>Sleep</p>
                        <input class="range-slider__range" id="range-slider__range" type="range" value="0" min="0"
                            max="5" step="1">
                        <output class="rangeslider__value sliderValueSleep" id="rangeslider__value"
                            id="sliderValueSleep">0</output>
                    </div>
                </div>
            </div>
            <div class="bottom-part">
                <!-- Output -->
                <p class="journal-output" id="journal-output"></p>
                <!-- Errors -->
                <p class="error-message" id="register-error"></p>
                <!-- Button -->
                <button type="submit" name="submit" id="submit">Save</button>
                <p class="complete-message">Don’t forget to complete your form tonight as you look back on your day.</p>
            </div>
        </form>
    <?php } ?>
    <div class="previous-entries"> <!-- Show all previous entries -->
        <?php if ($getJournalEntries["status"]) { ?>
        <?php foreach ($getJournalEntries["data"] as $journalEntry) { ?>
        <div class="entry-container">
            <?php
                // Get todays date
                $date = date("Y-m-d");
                // Get the dates in the db
                $dbdate = date("Y-m-d", strtotime($journalEntry["date"]));
                // print_r($date);
                // If todays date is already in the db you should be able to update todays entry
                if( $date === $dbdate ) { ?>
                    <a href="updateEntry.php?id=<?php echo $journalEntry["id"] ?>"
                        class="edit-entry"><?php echo date("l, d.m.Y", strtotime($journalEntry["date"])); ?><i
                    class="fas fa-edit"></i></a>
            <?php } else { // if its not todays date you shouldn't be able to edit the entry ?> 
                <a href="showEntry.php?id=<?php echo $journalEntry["id"] ?>"
                    class="see-entry"><?php echo date("l, d.m.Y", strtotime($journalEntry["date"])); ?><i
                class="fas fa-eye"></i></a>
            <?php } ?>
        </div>
        <?php } ?>
        <?php }?>
    </div>
    </div>

</section>
<?php require('partials/footer.php'); ?>
<script>
/* Range Slider */
let slider = document.getElementById("range-slider__range");
let output = document.getElementById("rangeslider__value");

output.innerHTML = slider.value;

slider.oninput = function() {
    output.innerHTML = this.value;
}

/* Ajax Submit */
const form = document.getElementById("journal-entry");
const journalOutput = document.getElementById("journal-output");

form.addEventListener("submit", function(e) {
    // Prevent the event from submitting the form, no redirect or page reload
    e.preventDefault();
    // Get the inputs and save them in a formattedData Object  
    const formattedFormData = {
        firstGoal: this.firstGoal.value,
        secondGoal: this.secondGoal.value,
        thirdGoal: this.thirdGoal.value,
        importantTaskField: this.importantTask.value,
        sliderValueSleep: this.rangeslider__value.value,
        submit: this.submit.value
    }
    // Send it to function postData
    postData(formattedFormData)
});

async function postData(formattedFormData) {
    const response = await fetch("includes/validateJournal.php", {
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
    journalOutput.innerHTML = data;
}
</script>
<?php require('partials/bodytag.php'); ?>