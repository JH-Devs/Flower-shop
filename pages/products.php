<?php 
    $pageTitle= "Produkty";
    include "../includes/header.php";
?>
<section class="products">
<div class="container-fluid">
   
<h1 class="title text-center mt-4">Produkty</h1>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 m-4 ">
        <?php 
        $select_products = mysqli_query($mysqli, "SELECT * FROM `products` ") or die ('chyba query');
        if(mysqli_num_rows($select_products) > 0) {
            while($fetch_products = mysqli_fetch_assoc($select_products)) {
        ?>
        
        <div class="col mb-4 ">
            <div class="card">
                <img src="../admin/image/<?php echo $fetch_products['image']; ?>" alt="" class="card-img-top">
                <h3><?php echo $fetch_products['name']; ?></h3>
                <p><?php echo $fetch_products['price']; ?> Kč</p>
                <div class="action-icons">
                <i class="fa-solid fa-heart text-danger"></i>
                <i class="fa-solid fa-cart-shopping text-success"></i>
                </div>
            </div>
        </div>
        <?php 
            }
        }
        ?>
    </div>


</div>
</section>
<?php include "../includes/footer.php" ?>