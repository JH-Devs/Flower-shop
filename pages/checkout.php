<?php 
    $pageTitle= "Pokladna";
    include "../includes/header.php";

?>
<section class="checkout">
<div class="container">
<h1 class="title text-center mt-4 mb-4">Pokladna</h1>
<div class="row gy-5">
    <div class="col lg-6 display-order">
        <div class="p-3">
            <h3>Seznam položek</h3>
            <?php
            $select_cart= mysqli_query($mysqli, "SELECT * FROM `cart` WHERE user_id= '$user_id' ");
            $total = 0;
            $grand_total = 0;
            if(mysqli_num_rows($select_cart)> 0) {
                while($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                    $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
                    $grand_total = $total += $total_price;
            ?>
                <span><?= $fetch_cart['name']; ?> (<?= $fetch_cart['quantity']; ?> x)</span>
            <?php
                 }
                }
            ?>
            <span class="grand-total"> Celková částka k zaplacení: <?= $grand_total; ?> Kč</span>
        </div>
    </div>
    <div class="col lg-6 payment">
        <div class="p-3">

        </div>
    </div>
</div>
</div>
</section>
<?php include "../includes/footer.php" ?>