<?php
session_start();
include("nav.inc.php");

// Check if Session has been started. If inactive destroy session.
if(isset($_SESSION["loggedIn"])) {

    if(time() - $_SESSION["timeOfLogin"] > 6000) {
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit;
    }
} else {
    $_SESSION["timeOfLogin"] = time();
}

// print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Description -->
    <meta name="description" content="Brainfuzz - For everyone with ADHD.">
    <!-- Keywords -->
    <meta name="keywords" content="ADHD, ADD, neurodevelopmental disorders">
    <!-- Title -->
    <title>Brain Fuzz</title>
    <!-- CSS -->
    <link rel="stylesheet" href="scss/main.css?<?php echo time(); ?>">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/dc5d036448.js" crossorigin="anonymous"></script>
</head>
<body>

<section class="navigation">
        <div class="logo">
            <img src="img/logo.svg" alt="Logo">
        </div>

        <h1 class="title"><a href="index.php">BRAIN FUZZ</a></h1>

    <nav>
        <!-- Main Navigation -->
        <ul class="main-nav">
            <?php
            /* If logged in -> loggedin Navigation */
                if (isset($_SESSION["loggedIn"])) {
                    foreach ($loggedInNav as $navitem) { ?>
                        <li><a class="nav-link <?php echo $class ?>" href="<?php echo $navitem['link'] ?>"><?php echo $navitem['name'] ?></a></li>
                    <?php } ?>
                <?php } 
                /* If not logged in -> Normal Navigation */
                else { 
                    foreach($mainNav as $navitem) { ?>
                        <li><a class="nav-link <?php echo $class ?>" href="<?php echo $navitem['link'] ?>"><?php echo $navitem['name'] ?></a></li>
                    <?php } ?>
            <?php } ?>
        </ul>

        <!-- Mobile Navigation -->
        <div class="burger-nav">
            <!-- Links -->
            <div class="burger-nav-links">
                <!-- Icon -->
                <div class="icon">
                    <i class="fas fa-bars"></i>
                </div>
                <!-- Mobile Nav -->
                <ul class="mobile-nav">
                    <?php
                    /* If logged in -> loggedin Navigation */
                        if (isset($_SESSION["loggedIn"])) {
                            foreach ($loggedInNav as $navitem) { ?>
                                <li><a class="nav-link <?php echo $class ?>" href="<?php echo $navitem['link'] ?>"><?php echo $navitem['name'] ?></a></li>
                            <?php } ?>
                        <?php } 
                        /* If not logged in -> Normal Navigation */
                        else { 
                            foreach($mainNav as $navitem) { ?>
                                <li><a class="nav-link <?php echo $class ?>" href="<?php echo $navitem['link'] ?>"><?php echo $navitem['name'] ?></a></li>
                            <?php } ?>
                    <?php } ?>
                </ul>
            </div>
        </div>

    </nav>
</section>
