<?php 
    $pageTitle= "Pokladna";
    include "../includes/header.php";


    /* odeslání objednávky*/
    if (isset($_POST['order_btn'])) {
        $name = mysqli_real_escape_string($mysqli, $_POST['name']);
        $email = mysqli_real_escape_string($mysqli, $_POST['email']);
        $number = mysqli_real_escape_string($mysqli, $_POST['number']);
        $method = mysqli_real_escape_string($mysqli, $_POST['method']);
        $address = mysqli_real_escape_string($mysqli, $_POST['street']. ',' .$_POST['city']. ',' .$_POST['zipcode']. ',' .$_POST['state']);
        $placed_on = date('d-M-Y');

        $cart_total = 0;
        $cart_products[]= '';
        $cart_query = mysqli_query($mysqli, "SELECT * FROM `cart` WHERE user_id='$user_id' ") or die('chyba query');

        if (mysqli_num_rows($cart_query) > 0) {
            while($cart_item = mysqli_fetch_assoc($cart_query)) {
                $cart_products[] = $cart_item['name'] . ' (' . $cart_item['quantity'] . ')';
                $sub_total = ($cart_item['price'] * $cart_item['quantity']);
                $cart_total+= $sub_total;
            }
        }
        $total_products = implode(', ', $cart_products);
        mysqli_query($mysqli, "INSERT INTO `orders` ( `user_id`, `name`,  `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`) VALUES ('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$total_price', '$placed_on' ) ");

        mysqli_query($mysqli, "DELETE FROM `cart` WHERE user_id='$user_id' ");
        $message[]= 'Objednávka byla odeslána.';
        header('location:/');
    }  
?>
<section class="checkout">
<div class="container">
<h1 class="title text-center mt-4 mb-4">Pokladna</h1>
<div class="row gy-5">
    <div class="col lg-6 display-order">
        <div class="p-3 mt-3">
            <h3>Seznam položek</h3>
            <?php
            $select_cart= mysqli_query($mysqli, "SELECT * FROM `cart` WHERE user_id= '$user_id' ");
            $total = 0;
            $grand_total = 0;
            if(mysqli_num_rows($select_cart)> 0) {
                while($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                    $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
                    $grand_total = $total += $total_price;
            ?>
                <span><?= $fetch_cart['name']; ?> (<?= $fetch_cart['quantity']; ?> x)</span>
            <?php
                 }
                }
            ?>
            <span class="grand-total"> Celková částka k zaplacení: <?= $grand_total; ?> Kč</span>
        </div>
    </div>
    <div class="col-lg-6 payment">
        <div class="p-3">
        <h3 class="text-center">Pokladna</h3>
        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label input">Jméno a příjmení</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Telefon</label>
                <input type="text" class="form-control" id="number" name="number" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Platba</label>
                <select name="method" class="form-control" >
                    <option selected>zvolte platební metodu</option>
                    <option value="dobírka">Dobírka</option>
                    <option value="kreditní karta">Kreditní karta</option>
                    <option value="paypal">PayPal</option>
                    <option value="bankovní převod">Bankovní převod</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Ulice</label>
                <input type="text" class="form-control" id="street" name="street" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Město</label>
                <input type="text" class="form-control" id="cityt" name="city" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">PSČ</label>
                <input type="number" class="form-control" id="zipcode" name="zipcode" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Stát </label>
                <select name="state" class="form-control" >
                <option selected>zvolte stát</option>
                    <option value="česká republika">Česká republika</option>
                    <option value="slovensko">Slovensko</option>
                </select>
            </div>
                <button type="submit" class="btn-add" name="order_btn">odeslat objednávku</button>
        </form>
        </div>
    </div>
</div>
</div>
</section>
<?php include "../includes/footer.php" ?>