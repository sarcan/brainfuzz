<?php
/* Requires */
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

require("partials/header.php"); 
?>
<section class="content">
<h3 class="specificDate"><?=date("l - d.m.Y", strtotime($getSpecificJournalEntry["date"]));?></h3>

<form action="" method="post" id="journal-entry-update">
        <input type="hidden" for="id" id="id" class="hide-id" value="<?php print_r($journalEntryId) ?>"></input>
        <!-- Left Side -->
        <div class="left-side">
            <div class="group">
                <label for="achieve">What have you achieved today?</label>
                <div class="goal-group">
                    <output for="First Goal"><span>🎯</span><?=$getSpecificJournalEntry["firstGoal"]?></output>
                </div>
                <div class="goal-group">
                    <output for="Second Goal"><span>🎯</span><?=$getSpecificJournalEntry["secondGoal"]?></output>
                </div>
                <div class="goal-group">
                    <output for="Third Goal"><span>🎯</span><?=$getSpecificJournalEntry["thirdGoal"]?></output>
                </div>
                <div class="summarize-group">
                    <label for="summarize">Did you achieve your goals today? Summarize your achievements.</label>
                    <textarea name="summary" id="summary" cols="30" rows="5"><?=$getSpecificJournalEntry["summary"]?></textarea>
                </div>
            </div>
            <div class="group">
                <label for="importantTask">What is my most important task?</label>
                <!-- <textarea name="importantTask" id="importantTask" cols="30" rows="5"></textarea> -->
                <output name="importantTask" id="importantTask" value="<?=$getSpecificJournalEntry["importantTask"]?>"><?=$getSpecificJournalEntry["importantTask"]?></output>
            </div>
            <div class="group">
                <label for="wentWell">What went well?</label>
                <textarea name="wentWell" id="wentWell" cols="30" rows="2"><?=$getSpecificJournalEntry["wentWell"]?></textarea>
            </div>
        </div>
        <!-- Middle Part -->
        <div class="middle-part">
            <div class="group">
                <label for="doBetter">What could I do better?</label>
                <textarea name="doBetter" id="doBetter" cols="30" rows="2"><?=$getSpecificJournalEntry["doBetter"]?></textarea>
            </div>
            <div class="group">
                <label for="ideas">Ideas</label>
                <textarea name="ideas" id="ideas" cols="30" rows="2"><?=$getSpecificJournalEntry["ideas"]?></textarea>
            </div>
        </div>
        <!-- Right Side -->
        <div class="right-side">
            <p class="range" id="range">Please rate from 1 to 5 how satisfied you were in the following area</p>
            <div class="range-slider" id="range-slider">
                <div class="range-group sleep">
                    <p>Sleep</p>
                    <output>You rated your sleep with <?=$getSpecificJournalEntry["sleep"]?> Stars <i class="fas fa-star"></i></output>
                </div>
            </div>
            <div class="range-slider" id="range-slider">
                <div class="range-group">
                    <p>Mood</p>
                    <input class="range-slider__range" id="rangeslider__value__mood" id="range-slider__range" type="range" value="<?=$getSpecificJournalEntry["mood"] ? $getSpecificJournalEntry["mood"] : 0?>" min="0" max="5" step="1">
                    <output class="rangeslider__value sliderValueMood" id="rangeslider__value" id="sliderValueMood"><?=$getSpecificJournalEntry["mood"] ? $getSpecificJournalEntry["mood"] : 0?></output>
                </div>
            </div>
            <div class="range-slider" id="range-slider">
                <div class="range-group">
                    <p>Motivation</p>
                    <input class="range-slider__range" id="rangeslider__value__motivation" id="range-slider__range" type="range" value="<?=$getSpecificJournalEntry["motivation"] ? $getSpecificJournalEntry["motivation"] : 0?>" min="0" max="5" step="1">
                    <output class="rangeslider__value sliderValueMotivation" id="rangeslider__value" id="sliderValueMotivation"><?=$getSpecificJournalEntry["motivation"] ? $getSpecificJournalEntry["motivation"] : 0?></output>
                </div>
            </div>
            <div class="range-slider" id="range-slider">
                <div class="range-group">
                    <p>Concentration</p>
                    <input class="range-slider__range" id="rangeslider__value__concentration" id="range-slider__range" type="range" value="<?=$getSpecificJournalEntry["concentration"] ? $getSpecificJournalEntry["concentration"] : 0 ?>" min="0" max="5" step="1">
                    <output class="rangeslider__value sliderValueConcentration" id="rangeslider__value" id="sliderValueConcentration"><?=$getSpecificJournalEntry["concentration"] ? $getSpecificJournalEntry["concentration"] : 0 ?></output>
                </div>
            </div>
            <div class="range-slider" id="range-slider">
                <div class="range-group">
                    <p>Tranquility</p>
                    <input class="range-slider__range" id="rangeslider__value__tranquility" id="range-slider__range" type="range" value="<?=$getSpecificJournalEntry["tranquility"] ? $getSpecificJournalEntry["tranquility"] : 0 ?>" min="0" max="5" step="1">
                    <output class="rangeslider__value sliderValueTranquility" id="rangeslider__value" id="sliderValueTranquility"><?=$getSpecificJournalEntry["tranquility"] ? $getSpecificJournalEntry["tranquility"] : 0 ?></output>
                </div>
            </div>
            <div class="range-slider" id="range-slider">
                <div class="range-group">
                    <p>Physical well-being</p>
                    <input class="range-slider__range" id="rangeslider__value__physical" id="range-slider__range" type="range" value="<?=$getSpecificJournalEntry["physical"] ? $getSpecificJournalEntry["physical"] : 0 ?>" min="0" max="5" step="1">
                    <output class="rangeslider__value sliderValuePhysical" id="rangeslider__value" id="sliderValuePhysical"><?=$getSpecificJournalEntry["physical"] ? $getSpecificJournalEntry["physical"] : 0 ?></output>
                </div>
            </div>
        </div>
        <div class="bottom-part">
            <!-- Output -->
            <div class="journal-output" id="journal-output"></div>
            <!-- Errors -->
            <div class="error-message" id="error-message"></div>
            <!-- Button -->
            <button type="submit" name="submit" id="submit">Save</button>
        </div>
    </form>
    <a href="journal.php" class="backtoentry">Back to Journal Entries</a>
</section>
<?php require('partials/footer.php'); ?>
<script>
/* Range Slider */
function rangeSlider() {
  let slider = document.querySelectorAll(".range-slider");
  let range = document.querySelectorAll(".range-slider__range");
  let value = document.querySelectorAll(".range-slider__value");

  slider.forEach((currentSlider) => {
    value.forEach((currentValue) => {
      let val = currentValue.previousElementSibling.getAttribute("value");
      currentValue.innerText = val;
    });

    range.forEach((elem) => {
      elem.addEventListener("input", (eventArgs) => {
        elem.nextElementSibling.innerText = eventArgs.target.value;
      });
    });
  });
}
rangeSlider();

/* Ajax Submit */
const form = document.getElementById("journal-entry-update");
const journalOutput = document.getElementById("journal-output");

// addEventListener on the whole form
form.addEventListener("submit", function(e) {
    // Prevent the event from submitting the form, no redirect or page reload
    e.preventDefault();
    // Get the inputs and save them in a formattedData Object  
    const formattedFormData = {
        id: this.id.value,
        summaryField: this.summary.value,
        wentWellField: this.wentWell.value,
        doBetterField: this.doBetter.value,
        ideasField: this.ideas.value,
        sliderValueMood: this.rangeslider__value__mood.value,
        sliderValueMotivation: this.rangeslider__value__motivation.value,
        sliderValueConcentration: this.rangeslider__value__concentration.value,
        sliderValueTranquility: this.rangeslider__value__tranquility.value,
        sliderValuePhysical: this.rangeslider__value__physical.value,
    }
    // Send it to function postData
    postData(formattedFormData)
});

async function postData(formattedFormData) {
    const response = await fetch("includes/updateJournal.php", {
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