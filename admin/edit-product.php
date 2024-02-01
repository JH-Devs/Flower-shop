<?php 
  $pageTitle= "Upravit produkt";
    include "./includes/admin-header.php";
?>
<?php
// aktualizace produktu
if (isset($_POST['update_product'])) {
    $update_p_id = $_POST['update_p_id'];
    $update_p_name = $_POST['update_p_name'];
    $update_p_price = $_POST['update_p_price'];
    $update_p_detail = $_POST['update_p_detail'];
    $update_p_image = $_FILES['update_p_image']['name'];
    $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
    $update_p_image_folder = 'image/' . $update_p_image;

    $update_query = mysqli_query($mysqli, "UPDATE `products` SET name='$update_p_name', price='$update_p_price', product_detail='$update_p_detail', image='$update_p_image' WHERE id='$update_p_id'") or die('chyba query');

    if ($update_query) {
        move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
        $message[] = 'produkt byl aktualizován';
        header('location:/admin/products');
    } else {
        $message[] = 'produkt se nepodařilo aktualizovat.';
    }
}
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
        <div class="mb-3 img-update">
                <img src="image/<?php echo $fetch_edit['image'] ?>">
                </div>
                <input class="form-control form-control-sm" id="formFileSm" type="file" name="update_p_image">

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
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="update_p_detail"><?php echo $fetch_edit['product_detail']; ?></textarea>
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

<script>
    // close btn
const closeBtn = document.querySelector('#close-edit');

closeBtn.addEventListener('click', () => {
    document.querySelector('.edit-product').style.display = 'none';
    window.location.href = '/admin/products'; 
});
</script>

<?php include "./includes/admin-footer.php" ?>