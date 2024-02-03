<?php 
  $pageTitle= "Galerie";
    include "./includes/admin-header.php";
?>
<?php

if (isset($_GET['delete'])) {
  $delete_id = $_GET['delete'];
  $select_delete_image = mysqli_query($mysqli, "SELECT image FROM `gallery` WHERE id= $delete_id ") or die ('chyba query');
  
  $fetch_delete_image = mysqli_fetch_assoc($select_delete_image);
  if ($fetch_delete_image && isset($fetch_delete_image['image'])) {
    unlink('image/gallery' . $fetch_delete_image['image']);
}

  mysqli_query($mysqli, "DELETE FROM `gallery` WHERE id='$delete_id'") or die('chyba query');

}

?>

<button onclick="window.location.href='/admin/add-image'" type="button" class="btn-add">Přidat obrázek</button>

<section class="products">
  <div class="container-fluid">
    <h1 class="title m-4">Galerie</h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 m-4 ">
      <?php 
        $select_gallery = mysqli_query($mysqli, "SELECT * FROM `gallery` ") or die ('chyba query');
        if(mysqli_num_rows($select_gallery) > 0) {
          while($fetch_gallery= mysqli_fetch_assoc($select_gallery)) {
      ?>
            <div class="col mb-4 m-2">
              <div class="card">
                <img src="image/gallery<?php echo $fetch_gallery['image']; ?>" alt="" class="card-img-top">
                <h3><?php echo $fetch_gallery['name']; ?></h3>
                

               <div class="action">
               <a href="/admin/edit-gallery?edit=<?php echo $fetch_gallery['id'] ?>" class="p-1 edit">upravit</a>
                <a href="/admin/gallery?delete=<?php echo $fetch_gallery['id'] ?>" class="p-1 delete" onclick=" return confirm('obrázek byl smazán');"><i class="fa-solid fa-trash-can"></i></a>
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

