<?php 
  $pageTitle= "Upravit produkt";
    include "./includes/admin-header.php";
?>
<?php

?>

<section class="edit-product">
    <?php
        if(isset($_GET['edit'])) {
            $edit_id = $_GET['edit'];
            $edit_query = mysqli_query($mysqli, "SELECT * FROM `products` WHERE id= $edit_id ") or die('chyba query');
            if(mysqli_num_rows($edit_query) > 0) {
                while($fetch_edit = mysqli_fetch_assoc($edit_query)) {

              
    ?>
    <h3 class="title m-4">Upravit produkt</h3>
    <form method="post" action="" enctype="multipart/form-data" class="mx-auto w-70 ">
        <div class="mb-3">
                <img src="image/<?php echo $fetch_edit['image'] ?>">

                <input class="form-control form-control-sm" id="formFileSm" type="file" name="update_p_image">
            </div>

            <div class="mb-3">
            <input type="hidden" class="form-control" id="exampleFormControlInput1" name="update_p_id" 
            value="<?php echo $fetch_edit['id']; ?>">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Název produktu</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="update_p_name"  value="<?php echo $fetch_edit['name']; ?>" >
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Cena</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="update_p_price"  value="<?php echo $fetch_edit['price']; ?>">
        </div>

            <div class="mb-3">
            <label for="product_detail" class="form-label">Popis</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="update_p_product_detail"><?php echo $fetch_edit['product_detail']; ?></textarea>
            </div>

            <button type="submit" class="btn-add" name="update_product">upravit produkt</button>

            <button type="reset" class="btn-add bg-danger" name="update_product" id="close-edit">zrušit</button>
    </form>
    <?php
          }
        }
    }
    ?>

</section>

<?php include "./includes/admin-footer.php" ?>