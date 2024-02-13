<?php 
    $pageTitle= "O nás";
    include "../includes/header.php";
?>
<section class="about">
<div class="container">
<h1 class="title text-center mt-4">O nás</h1>
<?php include "../includes/banner.php" ;?>

<div class="row gy-5">
    <div class="col-lg-6">
      <div class="p-3">
        <h2 class="title">Kdo jsme</h2>
        <div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum eos quas dolorem fuga quaerat perferendis culpa, numquam ut praesentium, veritatis eum labore aliquid pariatur unde asperiores aspernatur voluptatum accusamus cumque? Fugit sequi odio ullam, accusamus debitis laudantium dolorem eveniet voluptatum, error magnam veniam quas ipsa, delectus voluptate dolor maxime esse?</p>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="p-3 img-about mt-2">
        <img src="../assets/img/flower.jpeg" alt="">
      </div>
    </div>
    <div class="col-lg-6">
      <div class="p-3 img-about"><img src="../assets/img/zahradnictvi.jpeg" alt=""></div>
    </div>
    <div class="col-lg-6">
      <div class="p-3">
      <h2 class="title">Naše zahradnictví</h2>
      <div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea, ab animi molestias dicta perspiciatis sed consequatur reprehenderit rem laborum quidem at, exercitationem sapiente ex adipisci ipsam, corporis eum modi dolor expedita minima non facere unde odio! A molestias, omnis tempora magni atque quia aperiam possimus magnam, natus voluptates reprehenderit praesentium.</p>
      </div>
      </div>
    </div>
    <div class="row mt-5">
    <h2 class="title mt-3 mb-3 text-center">Naši floristé</h2>
    <div class="col-lg-4 ">
      <div class="p-3 fl-card">
        <img src="../assets/img/flor-1.jpeg" alt="">
        <span class="text-center ">Jana Janička</span>
      </div>
    </div>
    <div class="col-lg-4">
    <div class="p-3 fl-card">
        <img src="../assets/img/flor-2.jpeg" alt="">
        <span class="text-center">Patrik Květina</span>
      </div>
    </div>
    <div class="col-lg-4">
    <div class="p-3 fl-card">
        <img src="../assets/img/flor-3.jpeg" alt="">
        <span class="text-center">Eliška Liška</span>
      </div>
    </div>
    </div>
    <div class="col-12">
      <div class="p-3 text-center">
      <h2 class="title"><i class="fa-solid fa-quote-left"></i> Řekli o nás <i class="fa-solid fa-quote-right"></i></h2>
      <?php include "../includes/reviews.php" ?>
      </div>
    </div>
  </div>

</div>
</section>
<div class="newsletter">
        <?php include "../includes/newsletter.php" ?>
    </div>
<?php include "../includes/footer.php" ?>