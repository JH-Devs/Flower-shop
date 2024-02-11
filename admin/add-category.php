<?php 
  $pageTitle= "Přidat kategorii";
    include "./includes/admin-header.php";
?>
<?php 
    if(isset($_POST['add_category'])) {
        $category_name = mysqli_real_escape_string($mysqli, $_POST['name']);

        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder ='image/categories/'.$image;

        $select_category_name = mysqli_query($mysqli, "SELECT name FROM `categories` WHERE name = '$category_name' ") or die ('chyba query');
        if(mysqli_num_rows($select_category_name) > 0) {
            $message[] = 'categorie již existuje';
        } else {
            $insert_category= mysqli_query($mysqli, "INSERT INTO `categories`(`name`, `image`) VALUES('$category_name','$image') ")or die (' chyba query');
            if($insert_category){
                if ($image_size > 20000000) {
                    $message[] = 'obrázek je moc velký.';
                } else {
                    move_uploaded_file($image_tmp_name, $image_folder);
                    $message[] = 'kategorie byla přidána.';
                    header('location:/admin/categories');
                }
            }
        }
    }

?>

<section class="add-product">
    <h3 class="title m-4">Přidat kategorii</h3>
    <form method="post" action="" enctype="multipart/form-data" class="mx-auto w-70 ">
        <div class="mb-3">
            <label for="name" class="form-label">Název kategorie</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name" required>
        </div> 
            <div class="mb-3">
                <label for="image" class="form-label">Obrázek kategorie</label>
                <input class="form-control form-control-sm" id="formFileSm" type="file" name="image">
            </div>
            <button type="submit" class="btn-add" name="add_category">přidat kategorii</button>

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


