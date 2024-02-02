<?php 
  $pageTitle= "Objednávky";
    include "./includes/admin-header.php";
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
    if(mysqli_num_rows($select_orders) > 0) {
        while($fetch_orders = mysqli_fetch_assoc($select_orders)) {
    ?>
            <td><?php echo $fetch_orders['id']?></td>
            <td><?php echo $fetch_orders['name'] ?></td>
            <td><?php echo $fetch_orders['number']?></td>
            <td><?php echo $fetch_orders['email']?></td>
            <td><?php echo $fetch_orders['address']?></td>
            <td><?php echo $fetch_orders['total_products']?></td>
            <td><?php echo $fetch_orders['method']?></td>
            <td><?php echo $fetch_orders['total_price']?></td>
            <td><?php echo $fetch_orders['placed_on']?></td>
            <td><?php echo $fetch_orders['payment_status']?></td>
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
