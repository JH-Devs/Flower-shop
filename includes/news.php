<?php 

 /* přidání produktu na wishlist */
 if (isset($_SESSION['user_id'])) {
    if (isset($_POST['add_to_wishlist'])) {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];

        $wishlist_number = mysqli_query($mysqli, "SELECT * FROM `wishlist` WHERE name='$product_name' AND user_id ='$user_id' ") or die ('chyba query');

        $cart_number = mysqli_query($mysqli, "SELECT * FROM `cart` WHERE name='$product_name' AND user_id ='$user_id' ") or die ('chyba query');
        if (mysqli_num_rows($wishlist_number) >0) {
            $message[]='produkt je už v seznamu přání';
        } else if (mysqli_num_rows($cart_number)>0){
            $message[]='produkt je už v košíku';
        } else {
            mysqli_query($mysqli, "INSERT INTO `wishlist`(`user_id`, `pid`, `name`, `price`, `image`) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_image')");
            $message = 'produkt byl přídán na seznam přání';
        }

    }
    /* přidání produktu do košíku */
    if (isset($_POST['add_to_cart'])) {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];

        $cart_number = mysqli_query($mysqli, "SELECT * FROM `cart` WHERE name='$product_name' AND user_id ='$user_id' ") or die ('chyba query');
       if (mysqli_num_rows($cart_number)>0){
            $message[]='produkt je už v košíku';
        } else {
            mysqli_query($mysqli, "INSERT INTO `cart`(`user_id`, `pid`, `name`, `price`, `image`, `quantity`) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_image', 1 )");
            $message = 'produkt byl přídán do košíku';
        }

    }

}
?>

    <h1 class="title text-center mt-4">Novinky </h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 m-4 ">
        <?php 
        $select_products = mysqli_query($mysqli, "SELECT * FROM `products` ORDER BY created_at DESC LIMIT 8") or die ('chyba query');
        if(mysqli_num_rows($select_products) > 0) {
            while($fetch_products = mysqli_fetch_assoc($select_products)) {
        ?>

        <form action="" method="post">
        <div class="col mb-4 ">
            <div class="card">
                <a href="/pages/detail?pid=<?php echo $fetch_products['id']; ?>">
                <img src="./admin/image/<?php echo $fetch_products['image']; ?>" alt="" class="card-img-top">
                </a>
                <h3><?php echo $fetch_products['name']; ?></h3>
                <input type="hidden" name="product_id" value="<?php echo $fetch_products['id'] ?>">

                <p><?php echo $fetch_products['price']; ?> Kč</p>

                <input type="hidden" name="product_id" value="<?php echo $fetch_products['id'] ?>">
                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name'] ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price'] ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image'] ?>">


                <div class="action-icons">

                <a href="/pages/detail?pid=<?php echo $fetch_products['id']; ?>"><i class="fa-solid fa-eye text-info"></i></a>
                
                <button type="submit" name="add_to_wishlist" class="btn-icon">
                <i class="fa-solid fa-heart text-danger"></i>
                </button>

                <button type="submit" name="add_to_cart" class="btn-icon">
                <i class="fa-solid fa-cart-shopping text-success"></i>
                </button>
                </div>
            </div>
            </form>
        </div>

        <?php 
            }
        }
        ?>
    </div>

