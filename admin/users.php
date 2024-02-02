<?php 
  $pageTitle= "Zákazníci";
    include "./includes/admin-header.php";
?>
<?php 
if (isset($_GET['delete'])) {
  $delete_id = $_GET['delete'];
  mysqli_query($mysqli, "DELETE FROM `users` WHERE id='$delete_id'") or die('chyba query');
  header('location: /admin/users');

}
?>

<section class="order-section">
<h1 class="title m-4">Zákazníci</h1>
<div class="container">
<table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Jméno</th>
        <th>Email</th>
        <th>Typ uživatele</th>
        <th>Akce</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    $select_users = mysqli_query($mysqli, "SELECT * FROM `users` WHERE user_type = 'zákazník' ") or die('chyba query');
    if(mysqli_num_rows($select_users) > 0) {
        while($fetch_users = mysqli_fetch_assoc($select_users)) {
    ?>
            <td><?php echo $fetch_users['id']?></td>
            <td><?php echo $fetch_users['name'] ?></td>
            <td><?php echo $fetch_users['email']?></td>
            <td><?php echo $fetch_users['user_type']?></td>
            <td>
               <a href="/admin/users?delete=<?php echo $fetch_users['id'] ?>" class="p-2 delete" onclick=" return conform('uživatel byl smazán');"><i class="fa-solid fa-trash-can text-danger"></i></a>
            </td>
        </tr>
        <?php 
        }
    }
    ?>
    </tbody>
</table>
</div>

<h1 class="title m-4">Admini</h1>
<div class="container">
<table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Jméno</th>
        <th>Email</th>
        <th>Typ uživatele</th>
        <th>Akce</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    $select_users = mysqli_query($mysqli, "SELECT * FROM `users` WHERE user_type = 'admin' ") or die('chyba query');
    if(mysqli_num_rows($select_users) > 0) {
        while($fetch_users = mysqli_fetch_assoc($select_users)) {
    ?>
            <td><?php echo $fetch_users['id']?></td>
            <td><?php echo $fetch_users['name'] ?></td>
            <td><?php echo $fetch_users['email']?></td>
            <td><?php echo $fetch_users['user_type']?></td>
            <td>
              <div>
              <i class="fa-solid fa-pencil"></i>

               <a href="/admin/users?delete=<?php echo $fetch_users['id'] ?>" class="p-2 delete" onclick=" return conform('uživatel byl smazán');"><i class="fa-solid fa-trash-can text-danger"></i></a>
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
