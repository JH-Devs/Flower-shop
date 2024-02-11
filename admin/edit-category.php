<?php 
  $pageTitle= "Upravit kategorii";
    include "./includes/admin-header.php";
?>
<?php
// aktualizace kategorie
if (isset($_POST['update_category'])) {
    $update_p_id = $_POST['update_p_id'];
    $update_p_name = $_POST['update_p_name'];
    $update_p_image = $_FILES['update_p_image']['name'];
    $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
    $update_p_image_folder = 'image/categories/' . $update_p_image;

    $update_query = mysqli_query($mysqli, "UPDATE `categories` SET name='$update_p_name', image='$update_p_image' WHERE id='$update_p_id'") or die('chyba query');

    if ($update_query) {
        move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
        $message[] = 'kategorie byla aktualizována';
        header('location:/admin/categories');
    } else {
        $message[] = 'kategorii se nepodařilo aktualizovat.';
    }
}
?>


<section class="edit-product">
    <?php
        if(isset($_GET['edit'])) {
            $edit_id = $_GET['edit'];
            $edit_query = mysqli_query($mysqli, "SELECT * FROM `categories` WHERE id= $edit_id ") or die('chyba query');
            if(mysqli_num_rows($edit_query) > 0) {
                while($fetch_edit = mysqli_fetch_assoc($edit_query)) {
        
    ?>
    <h3 class="title m-4">Upravit kategorii</h3>
    <form method="post" action="" enctype="multipart/form-data" class="mx-auto w-70 ">
        <div class="mb-3 img-update">
                <img src="image/categories/<?php echo $fetch_edit['image'] ?>">
                </div>
                <input class="form-control form-control-sm" id="formFileSm" type="file" name="update_p_image">

            <div class="mb-3">
            <input type="hidden" class="form-control" id="exampleFormControlInput1" name="update_p_id" 
            value="<?php echo $fetch_edit['id']; ?>">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Název kategorie</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="update_p_name"  value="<?php echo $fetch_edit['name']; ?>" >
        </div>


            <button type="submit" class="btn-add" name="update_category">upravit kategorii</button>

            <button type="reset" class="btn-add bg-danger" name="update_category" id="close-edit">zrušit</button>
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
    document.querySelector('.edit-category').style.display = 'none';
    window.location.href = '/admin/categories'; 
});
</script>

<?php include "./includes/admin-footer.php" ?>

