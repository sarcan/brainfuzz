<?php require('partials/header.php'); ?>
<section class="content">
    <h2>ABOUT ME</h2>
    <div class="about-div">
        <div class="left">
            <p>
                Hi! 😄 <br><br>
                My name is Sarah and I was diagnosed with ADHD 3 years ago. I got to know ADHD pretty early during my
                time in primary school. A schoolmate of mine was diagnosed with it. I didn't know much about ADHD, only
                that hyperactivity is a symptom. Only later I've found out, that there was more to ADHD than just
                hyperactivity.
                <br><br>

                A couple years ago my mother got diagnosed with ADHD. I was reading up on symptoms and the differences
                ADHD has on boys, girls and adults. Since I could identify with certain symptoms I went to see a
                psychiatrist to check if I possibly could have the same diagnosis and I did. <br><br>

                Over time I've collected some of my favorite strategies on how to best work with my ADHD and I have
                created Brainfuzz as a tool to help myself and others with ADHD. <br><br>

                Let me know if you have any suggestions or comments on how Brainfuzz could be more effective for you.
            </p>
        </div>
        <div class="right">
            <img src="img/about-me-picture.JPG" alt="About me">
        </div>
    </div>

    <div class="contact-me" id="contact">
        <h2>CONTACT ME</h2>

        <form action="" id="contact-form">
            <!-- Name -->
            <div class="group">
                <div class="input">
                    <input type="text" name="name" id="name" placeholder="Your Name" required>
                    <hr>
                </div>
            </div>
            <!-- Mail -->
            <div class="group">
                <div class="input">
                    <input type="email" name="email" id="email" placeholder="Your E-Mailadress" required>
                    <hr>
                </div>
            </div>
            <!-- Message -->
            <div class="group">
                <div class="input">
                    <textarea name="message" id="" cols="20" rows="10" placeholder="Your message"></textarea>
                </div>
            </div>
            <!-- Error -->
            <p id="output"></p>
            <!-- Button -->
            <button type="submit" name="submit">Contact me!</button>
        </form>

    </div>
</section>
<?php require('partials/footer.php'); ?>
<script>
/* Ajax Submit */
const form = document.getElementById("contact-form");
const output = document.getElementById("output");

// addEventListener on the whole form
form.addEventListener("submit", function(e) {
    // Prevent the event from submitting the form, no redirect or page reload
    e.preventDefault();
    // Get the inputs and save them in a formattedData Object  
    const formattedFormData = {
        name: this.name.value,
        email: this.email.value,
        message: this.message.value,
    }
    // Send it to function postData
    postData(formattedFormData)
});

async function postData(formattedFormData) {
    const response = await fetch("includes/contactme.php", {
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
    output.innerHTML = data;
}
</script>
<?php require('partials/bodytag.php'); ?>