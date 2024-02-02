<?php 
  $pageTitle= "Zprávy";
    include "./includes/admin-header.php";
?>
<?php 
if (isset($_GET['delete'])) {
  $delete_id = $_GET['delete'];
  mysqli_query($mysqli, "DELETE FROM `messages` WHERE id='$delete_id'") or die('chyba query');
  header('location: /admin/messages');

}
?>

<section class="messages-section">
<h1 class="title m-4">Zprávy</h1>
<div class="container">
<table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Jméno</th>
        <th>Email</th>
        <th>Číslo</th>
        <th>Předmět</th>
        <th>Zpráva</th>
        <th>Akce</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    $select_messages = mysqli_query($mysqli, "SELECT * FROM `messages` ") or die('chyba query');
    if(mysqli_num_rows($select_messages) > 0) {
        while($fetch_mesages = mysqli_fetch_assoc($select_messages)) {
    ?>
            <td><?php echo $fetch_mesages['id']?></td>
            <td><?php echo $fetch_mesages['name'] ?></td>
            <td><?php echo $fetch_mesages['email']?></td>
            <td><?php echo $fetch_mesages['number'] ?></td>
            <td><?php echo $fetch_mesages['subject'] ?></td>
            <td><?php echo $fetch_mesages['message']?></td>
            <td>
               <a href="/admin/mesages?delete=<?php echo $fetch_messages['id'] ?>" class="p-2  delete" onclick=" return conform('zpráva byla smazána');"><i class="fa-solid fa-trash-can text-danger"></i></a>
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

