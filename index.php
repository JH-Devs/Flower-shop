<?php 
    $pageTitle= "Homepage";
    include "./includes/header.php";

?>
<div class="homepage">
<div class=" home ">
    <section class="slider">
    <?php include "./includes/slider.php"; ?> 
    </section>
    
    <div class="container-fluid">
        <section class="news">
        <?php include "./includes/news.php"; ?>
        </section>
    </div>

    <?php include "./includes/banner.php" ;?>
    
    <div class="container-fluid">
        <section class="categories">
        <?php include "./includes/top-categories.php"; ?>
        </section>
    </div>

    <div class="container-fluid">
        <section class="gallery-home ">
        <?php include "./includes/gallery-home.php"; ?>
        </section>
    </div>
    </div>
</div>
<div class="newsletter">
        <?php include "./includes/newsletter.php" ?>
    </div>
<?php include "./includes/footer.php"; ?>