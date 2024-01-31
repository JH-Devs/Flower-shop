<?php 
  $pageTitle= "Přidat produkt";
    include "./includes/admin-header.php";
?>
<?php 
    if(isset($_POST['add_product'])) {
        $product_name = mysqli_real_escape_string($mysqli, $_POST['name']);
        $product_price = mysqli_real_escape_string($mysqli, $_POST['price']);
        $product_detail = mysqli_real_escape_string($mysqli, $_POST['product_detail']);
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder ='image/'.$image;

        $select_product_name = mysqli_query($mysqli, "SELECT name FROM `products` WHERE name = '$product_name' ") or die ('chyba query');
        if(mysqli_num_rows($select_product_name) > 0) {
            $message[] = 'produkt již existuje';
        } else {
            $insert_product= mysqli_query($mysqli, "INSERT INTO `products`(`name`, `price`, `product_detail`, `image`) VALUES('$product_name', '$product_price', '$product_detail','$image') ")or die (' chyba query');
            if($insert_product){
                if ($image_size > 20000000) {
                    $message[] = 'obrázek je moc velký.';
                } else {
                    move_uploaded_file($image_tmp_name, $image_folder);
                    $message[] = 'produkt byl přidán.';
                    header('location:/admin/products');
                }
            }
        }
    }

?>

<section class="add-product">
    <h3 class="title m-4">Přidat produkt</h3>
    <form method="post" action="" enctype="multipart/form-data" class="mx-auto w-70 ">
        <div class="mb-3">
            <label for="name" class="form-label">Název produktu</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Cena</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="price" required>
        </div>
            <div class="mb-3">
            <label for="product_detail" class="form-label">Popis</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="product_detail" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Obrázek produktu</label>
                <input class="form-control form-control-sm" id="formFileSm" type="file" name="image">
            </div>
            <button type="submit" class="btn-add" name="add_product">přidat produkt</button>

            <?php 
        if (isset($message)) {
            foreach ($message as $message) {
                echo '
                <div class="message">
                    <span>'.$message.'</span>
                    <i class="fa-solid fa-xmark" onclick="this.parentElement.remove()"></i>
                </div>
                ';
            }
        }
    ?>
    </form>
</section>


<?php include "./includes/admin-footer.php" ?>


