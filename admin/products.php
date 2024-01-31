<?php 
  $pageTitle= "Produkty";
    include "./includes/admin-header.php";
?>
<button onclick="window.location.href='/admin/add-product'" type="button" class="btn-add">Přidat produkt</button>

<section class="products">
  <div class="container">
    <h1 class="title m-4">Produkty</h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 ">
      <?php 
        $select_products = mysqli_query($mysqli, "SELECT * FROM `products` ") or die ('chyba query');
        if(mysqli_num_rows($select_products) > 0) {
          while($fetch_products = mysqli_fetch_assoc($select_products)) {
      ?>
            <div class="col mb-4 m-2">
              <div class="card">
                <img src="image/<?php echo $fetch_products['image']; ?>" alt="" class="card-img-top">
                <h3><?php echo $fetch_products['name']; ?></h3>
                <p><?php echo $fetch_products['price']; ?> Kč</p>
              </div>
            </div>
      <?php 
          }
        }
      ?>
    </div>
  </div>
</section>

<?php include "./includes/admin-footer.php" ?>

