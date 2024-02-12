<?php 
  $pageTitle= "Kategorie";
    include "./includes/admin-header.php";
?>
<?php 
if (isset($_GET['delete'])) {
  $delete_id = $_GET['delete'];
  mysqli_query($mysqli, "DELETE FROM `categories` WHERE id='$delete_id'") or die('chyba query');
  header('location: /admin/categories');

  $fetch_delete_image = mysqli_fetch_assoc($select_delete_image);
  if ($fetch_delete_image && isset($fetch_delete_image['image'])) {
    unlink('image/categories/' . $fetch_delete_image['image']);
}

  mysqli_query($mysqli, "DELETE FROM `categories` WHERE id='$delete_id'") or die('chyba query');

}


?>

<button onclick="window.location.href='/admin/add-category'" type="button" class="btn-add">Přidat kategorii</button>

<section class="categories-section">
<h1 class="title m-4">Kategorie</h1>
<div class="container">
<table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Obrázek</th>
        <th>Název</th>
        <th>Akce</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    $select_categories = mysqli_query($mysqli, "SELECT * FROM `categories` ") or die('chyba query');
    if(mysqli_num_rows($select_categories) > 0) {
        while($fetch_categories = mysqli_fetch_assoc($select_categories)) {
    ?>
            <td><?php echo $fetch_categories['id']?></td>
            <td>
            <img src="image/categories/<?php echo $fetch_categories['image']; ?>" alt="" class="card-img-top ">
            </td>
            <td><?php echo $fetch_categories['name']?></td>
        <td>  
            <div class="action">
            <a href="/admin/edit-category?edit=<?php echo $fetch_categories['id'] ?>" class="p-1 edit"><i class="fa-solid fa-pen text-info"></i></a>

               <a href="/admin/category?delete=<?php echo $fetch_categories['id'] ?>" class="p-1  delete" onclick=" return confirm('kategorie byla smazána');"><i class="fa-solid fa-trash-can text-danger"></i></a>
            </div>
            </td>
        </tr>
        <?php 
        }
    }
    ?>
    </tbody>
</table>
</div>
</section>

<?php include "./includes/admin-footer.php" ?>

