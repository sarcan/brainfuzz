<?php require('partials/header.php'); ?>
<section class="content">
    <div class="upper-part">
        <!-- Typewriter -->
        <div class="typewriter">
            <span class='typewriter-text' data-text='[
                    "Hyperactive",
                    "Engaging",
                    "Unorganized",
                    "Confused",
                    "Creative",
                    "Restless",
                    "Hyperfocused",
                    "Emotional",
                    "Distracted",
                    "Problemsolver",
                    "Inattentive",
                    "Impulsive",
                    "Insomnia"]'></span>
        </div>

        <!-- Image -->
        <figure>
            <img src="img/studying.jpg" alt="A drawing of a person studying." class="person-studying">
            <figcaption>Getty</figcaption>
        </figure>
    </div>

    <div class="middle-part">
        <div class="introduction">
            <h2>TYPICAL SYMPTOMS</h2>
            <p>These are symptoms an adult with adhd can experience. Symptoms are already present before the age
                of 7 and are not only present at times. <br><br> These symptoms vary in type and severity from person to
                person.
                Often there are rapid mood swings and organizational problems in various areas of life.</p>
        </div>
        <div class="overview">
            <h2>WHAT IS ADHD</h2>
            <p>Adult attention-deficit/hyperactivity disorder (ADHD) is a mental health disorder that includes a
                combination of persistent problems, such as difficulty paying attention, hyperactivity and impulsive
                behavior. Adult ADHD can lead to unstable relationships, poor work or school performance, low
                self-esteem, and other problems. <br><br> Though it's called adult ADHD, symptoms start in early
                childhood and continue into adulthood. In some cases, ADHD is not recognized or diagnosed until the
                person is an adult. Adult ADHD symptoms may not be as clear as ADHD symptoms in children. In adults,
                hyperactivity may decrease, but struggles with impulsiveness, restlessness and difficulty paying
                attention may continue. <a
                    href="https://www.mayoclinic.org/diseases-conditions/adult-adhd/symptoms-causes/syc-20350878">Source</a>
            </p>
        </div>
    </div>

    <div class="lowest-part">
        <div class="dealing">
            <h2>DEALING WITH ADHD</h2>
            <p>Symptoms people with adhd face can vary from person to person. Since the problems with ADHD are very
                individual, it is difficult to give general advice. <br> But there are some strategies helpful when dealing
                with
                it.
            </p>
        </div>
        <div class="benefits">
              <h2>START YOUR JOURNEY WITH US!</h2>
              <p>On Brainfuzz you will find tools and ressources that can help you manage ADHD:</p>
              <ul>
                <li><a href="resources.php">Medidation Exercises</a></li>
                <li><a href="resources.php?page=pmr">Progressive Muscle Relaxation Exercises</a></li>
                <li><a href="signin.php">Timer</a></li>
                <li><a href="signin.php">Journal</a></li>
                <li><a href="resources.php">And more Resources</a></li>
              </ul>
        </div>
    </div>
</section>
<?php require('partials/footer.php'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script>
/* Typewriter Text */
typing(0, $('.typewriter-text').data('text'));
// Typing
function typing(index, text) {

    let textIndex = 1;

    let tmp = setInterval(function() {
        if (textIndex < text[index].length + 1) {
            $('.typewriter-text').text(text[index].substr(0, textIndex));
            textIndex++;
        } else {
            setTimeout(function() {
                deleting(index, text)
            }, 2000);
            clearInterval(tmp);
        }

    }, 150);

}
// Deleting
function deleting(index, text) {

    let textIndex = text[index].length;

    let tmp = setInterval(function() {

        if (textIndex + 1 > 0) {
            $('.typewriter-text').text(text[index].substr(0, textIndex));
            textIndex--;
        } else {
            index++;
            if (index == text.length) {
                index = 0;
            }
            typing(index, text);
            clearInterval(tmp);
        }

    }, 150)
}
</script>
<?php require('partials/bodytag.php'); ?>