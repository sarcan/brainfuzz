<?php require('partials/header.php'); ?>
<section class="content">
<h2>TIMER ⏲️</h2>
<div class="container">
    <div id="pomodoro"> 
        <div id="status"></div>
        <div class="timerDisplay">25:00</div>
        <button id="start-btn" class="btn">START</button>
    </div>
    <hr>

  <div class="settings">
    <div id="work">
      <p>Work Duration</p>
      <button class="btn-settings" id="work-plus">+</button>
      <div><span id="work-min">25</span> mins</div>
      <button class="btn-settings" id="work-minus">-</button>
    </div>
    
    <button id="reset" class="btn">RESET</button>
    
    <div id="break">
      <p>Break Duration</p>
      <button class="btn-settings" id="break-plus">+</button>
      <div><span id="break-min">5</span> mins</div>
      <button class="btn-settings" id="break-minus">-</button>
    </div>
  </div>
</div>

</section>
<?php require('partials/footer.php'); ?>
<script src="js/timer.js"></script>
<?php require('partials/bodytag.php'); ?>