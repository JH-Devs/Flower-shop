<?php 
  $pageTitle= "Nástěnka";
    include "./includes/admin-header.php";
?>
<section class="dashboard">
  <div class="container">
  <h1 class="title m-4">Nástěnka</h1>
  <div class="row flex mt-4 row-cols-1 row-cols-sm-2 row-cols-md-4 text-center">
    <div class="col border m-4 p-4 bg-light rounded-2">
        <?php
          $total_pendings = 0;
          $select_pendings = mysqli_query($mysqli, "SELECT * FROM `orders` WHERE payment_status = 'čeká na platbu' ") or die('chyba query');
          while ($fetch_pendings = mysqli_fetch_assoc($select_pendings)) {
            $total_pendings += intval($fetch_pendings['total_price']);
          }
        ?>
        <h3 class="text-secondary"><?php echo $total_pendings; ?> Kč</h3>
        <p class="text-title">nevyřízené objednávky</p>
    </div>
    <div class="col border m-4 p-4 bg-light rounded-2">
    <?php
          $total_completed = 0;
          $select_completed = mysqli_query($mysqli, "SELECT * FROM `orders` WHERE payment_status = 'zaplaceno' ") or die('chyba query');
          while ($fetch_completed = mysqli_fetch_assoc($select_completed)) {
            $total_completed += $fetch_completed['total_price'];
          }
        ?>
        <h3 class="text-primary"><?php echo $total_completed; ?> Kč</h3>
        <p class="text-title">vyřízené objednávky</p>
    </div>
    <div class="col border m-4 p-4 bg-light rounded-2">
    <?php
          $select_orders = mysqli_query($mysqli, "SELECT * FROM `orders`") or die('chyba query');
          $num_of_orders = mysqli_num_rows($select_orders);
        ?>
        <h3 class="text-warning"><?php echo $num_of_orders; ?></h3>
        <p class="text-title">zaplacené objednávky</p>
    </div>
  </div>

  <div class="row flex mt-4 row-cols-1 row-cols-sm-2 row-cols-md-4 text-center">
    <div class="col border m-4 p-4 bg-light rounded-2">
    <?php
          $select_products = mysqli_query($mysqli, "SELECT * FROM `products`") or die('chyba query');
          $num_of_products = mysqli_num_rows($select_products);
        ?>
        <h3 class="text-success"><?php echo $num_of_products; ?></h3>
        <p class="text-title">produkty</p>
    </div>

    <div class="col border m-4 p-4 bg-light rounded-2 ">
    <?php
          $select_categories = mysqli_query($mysqli, "SELECT * FROM `categories` ") or die('chyba query');
          $num_of_categories = mysqli_num_rows($select_categories);
        ?>
        <h3 class="text-secondary"><?php echo $num_of_categories; ?></h3>
        <p class="text-title">kategorie</p>
    </div>

    <div class="col border m-4 p-4 bg-light rounded-2 ">
    <?php
          $select_users = mysqli_query($mysqli, "SELECT * FROM `users` WHERE user_type = 'zákazník' ") or die('chyba query');
          $num_of_users = mysqli_num_rows($select_users);
        ?>
        <h3 class="text-info"><?php echo $num_of_users; ?></h3>
        <p class="text-title">zákazníci</p>
    </div>

    <div class="col border m-4 p-4 bg-light rounded-2">
    <?php
          $select_messages = mysqli_query($mysqli, "SELECT * FROM `messages`") or die('chyba query');
          $num_of_messages = mysqli_num_rows($select_messages);
        ?>
        <h3 class="text-danger"><?php echo $num_of_messages; ?></h3>
        <p class="text-title">zprávy</p>
    </div>
    
  </div>
</div>
</section>
 

<?php include "./includes/admin-footer.php" ?>
