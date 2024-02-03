<?php 
  $pageTitle= "Přidat obrázek";
    include "./includes/admin-header.php";
?>
<?php 
    if(isset($_POST['add_gallery'])) {
        $gallery_name = mysqli_real_escape_string($mysqli, $_POST['name']);
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder ='image/gallery'.$image;

        $select_gallery_name = mysqli_query($mysqli, "SELECT name FROM `gallery` WHERE name = '$gallery_name' ") or die ('chyba query');
        if(mysqli_num_rows($select_gallery_name) > 0) {
            $message[] = 'obrázek již existuje';
        } else {
            $insert_gallery = mysqli_query($mysqli, "INSERT INTO `gallery`(`name`, `image`) VALUES('$gallery_name', '$image') ") or die (' chyba query');

            if($insert_gallery){
                if ($image_size > 20000000) {
                    $message[] = 'obrázek je moc velký.';
                } else {
                    move_uploaded_file($image_tmp_name, $image_folder);
                    $message[] = 'obrázek byl přidán.';
                    header('location:/admin/gallery');
                }
            }
        }
    }

?>

<section class="add-product">
    <h3 class="title m-4">Přidat obrázek</h3>
    <form method="post" action="" enctype="multipart/form-data" class="mx-auto w-70 ">
        <div class="mb-3">
            <label for="name" class="form-label">Název obrázku</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name" required>
        </div>
            <div class="mb-3">
                <label for="image" class="form-label">Obrázek </label>
                <input class="form-control form-control-sm" id="formFileSm" type="file" name="image">
            </div>
            <button type="submit" class="btn-add" name="add_gallery">přidat obrázek</button>

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


