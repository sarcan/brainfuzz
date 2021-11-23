<?php
require('partials/header.php');
$page = isset($_GET['page']) ? $_GET['page']:'mindfulness-exercises';
?>
<section class="content">
    <h2>RESOURCES 🗄️</h2>
    <div class="content-resources">
        <nav class="subnavigation">
            <ul>
            <?php
                foreach($resourcesNav as $navitem) {
                    if( $page == $navitem['link'] ){
                        $class = 'active';
                    }else{
                        $class = '';
                    }
                ?>
                <li class="nav-item"><a class="nav-link <?php echo $class ?>" href="resources.php?page=<?php echo $navitem['link'] ?>"><?php echo $navitem['name'] ?></a></li>
                <?php } ?>
            </ul>
        </nav>

        <?php
            // Get GET Parameter for Content 
            if ( is_file('pages/'.$page.'.php') ){
                include('pages/'.$page.'.php');
            }else{
                echo 'Seite nicht gefunden...';
            }
        ?>

    </div>
</section>
<?php require('partials/footer.php'); ?>
<script src="js/audio.js"></script>
<?php require('partials/bodytag.php'); ?>