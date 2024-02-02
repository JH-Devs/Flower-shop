<?php 
  $pageTitle= "Produkty";
    include "./includes/admin-header.php";
?>
<?php

if (isset($_GET['delete'])) {
  $delete_id = $_GET['delete'];
  $select_delete_image = mysqli_query($mysqli, "SELECT image FROM `products` WHERE id= $delete_id ") or die ('chyba query');
  
  $fetch_delete_image = mysqli_fetch_assoc($select_delete_image);
  if ($fetch_delete_image && isset($fetch_delete_image['image'])) {
    unlink('image/' . $fetch_delete_image['image']);
}

  mysqli_query($mysqli, "DELETE FROM `products` WHERE id='$delete_id'") or die('chyba query');

  mysqli_query($mysqli, "DELETE FROM `cart` WHERE id='$delete_id'") or die('chyba query');

  mysqli_query($mysqli, "DELETE FROM `wishlist` WHERE id='$delete_id'") or die('chyba query');
}

?>

<button onclick="window.location.href='/admin/add-product'" type="button" class="btn-add">Přidat produkt</button>

<section class="products">
  <div class="container">
    <h1 class="title m-4">Produkty</h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
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
                <p class="text-dark text-truncate product-detail"><?php echo $fetch_products['product_detail']; ?> </p>

               <div class="action">
               <a href="/admin/edit-product?edit=<?php echo $fetch_products['id'] ?>" class="p-1 edit">upravit</a>
                <a href="/admin/products?delete=<?php echo $fetch_products['id'] ?>" class="p-1 delete" onclick=" return confirm('produkt byl smazán');"><i class="fa-solid fa-trash-can"></i></a>
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


<?php include "./includes/admin-footer.php" ?>

