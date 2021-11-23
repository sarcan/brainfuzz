<?php require('partials/header.php'); ?>
<section class="content">
<h2>JOURNAL</h2>

<div class="journal">
    <h3><?= date("l, d.m.Y") ?></h3>
    <form action="" method="post">
        <div class="left-side">
            <div class="group">
                <label for="achieve">What do I want to achieve today?</label>
                <textarea name="archieve" id="archieve" cols="30" rows="10"></textarea>
            </div>
            <div class="group">
                <label for="importantTask">What is my most important task?</label>
                <textarea name="importantTask" id="importantTask" cols="30" rows="5"></textarea>
            </div>
        </div>

        <div class="right-side">
            <div class="range-slider" id="range-slider">
                <p class="range" id="range">Please rate from 1 to 5 how satisfied you were in the following area (1 being the worst, 5 being the best)</p>
                <div class="range-group">
                    <p>Sleep</p>
                    <input class="range-slider__range" id="range-slider__range" type="range" value="0" min="0" max="5" step="1">
                    <span class="range-slider__value" id="range-slider__value">0</span>
                </div>
            </div>
        </div>
    </form>
</div>
</section>

<?php require('partials/footer.php'); ?>
<!-- <script src="js/range-slider.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script>
    let rangeSlider = function(){
    let slider = $('.range-slider'),
        range = $('.range-slider__range'),
        value = $('.range-slider__value');
        
    slider.each(function(){

        value.each(function(){
        let value = $(this).prev().attr('value');
        $(this).html(value);
        });

        range.on('input', function(){
        $(this).next(value).html(this.value);
        });
    });
};

rangeSlider();
</script>
<?php require('partials/bodytag.php'); ?>