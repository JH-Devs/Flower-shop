<?php 
    $pageTitle= "Nákupní košík";
    include "../includes/header.php";


 if (isset($_SESSION['user_id'])) {

   
     // Aktualizace množství
     if (isset($_POST['update_quantity_btn'])) {
        $update_id = $_POST['update_quantity_id'];
        $new_quantity = $_POST['update_quantity'];

        mysqli_query($mysqli, "UPDATE `cart` SET `quantity`='$new_quantity' WHERE `id`='$update_id'") or die ('chyba query');
        header('Location: /pages/cart');
    }
   
    /* smazání z košíku */
    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];

        mysqli_query($mysqli, "DELETE FROM `cart` WHERE id='$delete_id' ") or die ('chyba query');
        header('location:/pages/cart');
    }
}
?>
<section class="cart">
<div class="container-fluid">
   
<h1 class="title text-center mt-4">Nákupní košík</h1>

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
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 m-4 ">

<table class="table ">
    <thead>
      <tr>
        <th>Obrázek</th>
        <th>Název</th>
        <th>Cena (ks)</th>
        <th>Množství</th>
        <th>Cena celkem</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php 
     $grand_total = 0;
     $select_cart = mysqli_query($mysqli, "SELECT * FROM `cart` WHERE user_id= '$user_id' ") or die ('chyba query');
     if(mysqli_num_rows($select_cart) > 0) {
         while($fetch_cart = mysqli_fetch_assoc($select_cart)) {
    ?>
            <td>
            <a href="/pages/detail?pid=<?php echo $fetch_cart['pid']; ?>">
            <img src="/admin/image/<?php echo $fetch_cart['image']; ?>" alt="" class="card-img-top cart-img">
         </a>
            </td>
            <td><?php echo $fetch_cart['name']?></td>
            <td><?php echo $fetch_cart['price']?> Kč</td>
            <td>
            <form action="" method="post">
               <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id'] ?>">
                <div class="qty">
                    <input type="text" class="inp-q" min="1" name="update_quantity"  value="<?php echo $fetch_cart['quantity'] ?>">
                    <button type="submit" name="update_quantity_btn" class="update_quantity_btn"><i class="fa-solid fa-arrows-rotate"></i></button>
                </div>
            </form>
            </td>
            <td><?php echo $total_amt = ($fetch_cart['price']*$fetch_cart['quantity']); ?> Kč</td>
        <td>  
            <div class="action">

               <a href="/pages/cart?delete=<?php echo $fetch_cart['id'] ?>" class="p-1  delete" onclick=" return confirm('chcete produkt odstranit z košíku?');"><i class="fa-solid fa-xmark text-danger"></i></a>
            </div>
            </td>
        </tr>
        <?php 
        $grand_total+= $total_amt;
        }
    }
    ?>
    </tbody>
</table>

    </div>
    <div class="wishlist-price">
    <p>Celková částka bez dopravy: <span><?php echo $grand_total ?> Kč</span></p>
    </div>
        <div class="wishlist-total">
           <button> <a href="/pages/products">pokračovat v nákupu</a></button>

           <button class="bg-warning"> <a href="/pages/checkout">Pokladna</a></button>
        </div>

</div>
</section>
<?php include "../includes/footer.php" ?>