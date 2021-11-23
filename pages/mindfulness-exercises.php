<?php
    if (isset($_SESSION["loggedIn"])) { ?>
        <section class="audio">

            <img class="audio-img" src="img/calm.jpg" alt="Image Audio-File">

            <div class="audio-title">
                <div class="audio-player">
                    <!-- Audio File -->
                    <audio id="audio-file" src="audio/meditation.mp3"></audio>
                    <!-- Timeline -->
                    <div class="timeline">
                        <div class="progress"></div>
                    </div>

                    <!-- Controls -->
                    <div class="controls">

                        <div class="play-container">
                            <i class="fas fa-play toggle-play play"></i>
                        </div>

                        <div class="time">
                            <div class="current">0:00</div>
                            <div class="divider">/</div>
                            <div class="length"></div>
                        </div>
                        
                        <div class="name">Mindfulness Exercise</div>

                        <!-- Funktioniert noch nicht -->
                        <div class="volume-container">
                            <div class="volume-button">
                                <i class="fas fa-volume-down"></i>
                            </div>
                            
                            <div class="volume-slider">
                                <div class="volume-percentage"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        
    <?php } else { ?>
        <div class="content-blocked">
            <p>To view this content you must be <a href="signin.php">signed in</a>.</p>
        </div>
    <?php }
?>