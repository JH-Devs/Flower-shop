<?php 
  $pageTitle= "Objednávky";
    include "./includes/admin-header.php";
?>
<?php
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    mysqli_query($mysqli, "DELETE FROM `orders` WHERE id = '$delete_id' ") or die ('chyba query');

    header('location:/admin/orders');
}

if (isset($_POST['update_order'])) {
    $order_id = $_POST['order_id'];
    $update_payment = $_POST['update_payment'];

    mysqli_query($mysqli, "UPDATE `orders` SET payment_status='$update_payment' WHERE id='$order_id'") or die('chyba query');
}




?>
<section class="order-section">
<h1 class="title m-4">Objednávky</h1>
<div class="container">
<table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Jméno</th>
        <th>Číslo</th>
        <th>Email</th>
        <th>Adresa</th>
        <th>Produkty</th>
        <th>Platba</th>
        <th>Celková cena</th>
        <th>Vytvořeno</th>
        <th>Status </th>
      </tr>
    </thead>
    <tbody>
    <?php
$select_orders = mysqli_query($mysqli, "SELECT * FROM `orders` ") or die('chyba query');
if (mysqli_num_rows($select_orders) > 0) {
    while ($fetch_orders = mysqli_fetch_assoc($select_orders)) {
?>
        <tr>
            <td><?php echo $fetch_orders['id'] ?></td>
            <td><?php echo $fetch_orders['name'] ?></td>
            <td><?php echo $fetch_orders['number'] ?></td>
            <td><?php echo $fetch_orders['email'] ?></td>
            <td><?php echo $fetch_orders['address'] ?></td>
            <td><?php echo $fetch_orders['total_products'] ?></td>
            <td><?php echo $fetch_orders['method'] ?></td>
            <td><?php echo $fetch_orders['total_price'] ?> Kč</td>
            <td><?php echo $fetch_orders['placed_on'] ?></td>
            <form action="" method="post">
                <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
                <td ><?php echo $fetch_orders['payment_status'] ?>
                <br>
                <select name="update_payment" >
                    <option disabled selected><?php echo $fetch_orders['payment_status'] ?></option>
                    <option value="Čeká na platbu">Čeká na platbu </option>
                    <option value="Zaplaceno">Zaplaceno</option>
                    <option value="Storno objednávky">Storno objednávky</option>
                </select>
                <br>
               <div class="action">
               <a href="/admin/orders?delete=<?php echo $fetch_orders['id'] ?>" class="mt-4" onclick=" return confirm('objednávka byla smazána');"><i class="fa-solid fa-trash-can"></i></a>

               <button type="submit" name="update_order" class="btn-add mt-4">aktualizovat</button>
               </div>
                </>             
            </form>
            <?php 
                }
            }
            ?>
    </tbody>
</table>
</div>
</section>


<?php include "./includes/admin-footer.php" ?>
