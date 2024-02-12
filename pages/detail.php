<?php
$pageTitle = "Detail produktu";
include "../includes/header.php";

/* přidání produktu na wishlist */
if (isset($_SESSION['user_id'])) {
    if (isset($_POST['add_to_wishlist'])) {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];

        $wishlist_number = mysqli_query($mysqli, "SELECT * FROM `wishlist` WHERE name='$product_name' AND user_id ='$user_id' ") or die('chyba query');

        $cart_number = mysqli_query($mysqli, "SELECT * FROM `cart` WHERE name='$product_name' AND user_id ='$user_id' ") or die('chyba query');
        if (mysqli_num_rows($wishlist_number) > 0) {
            $message[] = 'produkt je už v seznamu přání';
        } else if (mysqli_num_rows($cart_number) > 0) {
            $message[] = 'produkt je už v košíku';
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
        $product_quantity = $_POST['product_quantity'];

        $cart_number = mysqli_query($mysqli, "SELECT * FROM `cart` WHERE name='$product_name' AND user_id ='$user_id' ") or die('chyba query');
        if (mysqli_num_rows($cart_number) > 0) {
            $message[] = 'produkt je už v košíku';
        } else {
            mysqli_query($mysqli, "INSERT INTO `cart`(`user_id`, `pid`, `name`, `price`, `image`, `quantity`) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_image', '$product_quantity' )");
            $message = 'produkt byl přídán do košíku';
        }
    }
}
?>
<section class="products">
    <div class="container-fluid overflow-hidden text-center">
        <?php
        if (isset($message)) {
            foreach ($message as $message) {
                echo '
                    <div class="message">
                        <span>' . $message . '</span>
                        <i class="fa-solid fa-xmark" onclick="this.parentElement.remove()"></i>
                    </div>
                    ';
            }
        }
        ?>
        <div class="row ">
            <?php
            if (isset($_GET['pid'])) {
                $pid = $_GET['pid'];
                $select_products = mysqli_query($mysqli, "SELECT * FROM `products` WHERE id='$pid' ") or die('chyba query');
                if (mysqli_num_rows($select_products) > 0) {
                    while ($fetch_products = mysqli_fetch_assoc($select_products)) {

                        // Získání názvu kategorie na základě cat_id
                        $cat_id = $fetch_products['cat_id'];
                        $select_category = mysqli_query($mysqli, "SELECT name FROM `categories` WHERE id='$cat_id'") or die('chyba dotazu na kategorie');
                        $category = mysqli_fetch_assoc($select_category);
            ?>
                        <h1 class="title text-center mt-4"><?php echo $fetch_products['name']; ?></h1>
                        <form action="" method="get">
                            <div class="container overflow-hidden text-center">
                                <div class="row gx-5">
                                    <div class="col-md-6">
                                        <div class="p-3">
                                            <img src="../admin/image/<?php echo $fetch_products['image']; ?>" alt="" class="image-detail">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-3">
                                            <h3 class="title-detail"><?php echo $fetch_products['name']; ?></h3>
                                            <p class="cat-p">Kategorie: <span class="cat-span"><?php echo $category['name']; ?></span></p>
                                            <p class="price-p">Cena: <span class="price-span"><?php echo $fetch_products['price']; ?> Kč</span> </p>

                                            <p> Množství: <span class="q-span"> <input type="text" name="product_quantity" value="1" min="0" class="inp-q"></span></p>

                                            <p class="mt-5"><?php echo $fetch_products['product_detail']; ?> </p>

                                            <input type="hidden" name="product_id" value="<?php echo $fetch_products['id'] ?>">
                                            <input type="hidden" name="product_name" value="<?php echo $fetch_products['name'] ?>">
                                            <input type="hidden" name="product_price" value="<?php echo $fetch_products['price'] ?>">
                                            <input type="hidden" name="product_image" value="<?php echo $fetch_products['image'] ?>">

                                            <div class="action-icons-detail mt-5">
                                                <button type="submit" name="add_to_wishlist" class="btn-icon">
                                                    <i class="fa-solid fa-heart text-danger"></i> seznam přání
                                                </button>
                                                <button type="submit" name="add_to_cart" class="btn-icon">
                                                    <i class="fa-solid fa-cart-shopping text-success"></i> přidat do košíku
                                                </button>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
            <?php
                    }
                }
            }
            ?>
        </div>
        <hr>
        <!-- Zobrazit produkty ve stejné kategorii -->
        <div class="row">
            <h2 class="title text-center mt-4">Další produkty ve stejné kategorii</h2>
            <?php
            if (isset($cat_id)) {
                $select_related_products = mysqli_query($mysqli, "SELECT * FROM `products` WHERE cat_id='$cat_id' AND id<>'$pid' LIMIT 4") or die('chyba dotazu na související produkty');
                if (mysqli_num_rows($select_related_products) > 0) {
                    while ($related_product = mysqli_fetch_assoc($select_related_products)) {
            ?>
                        <div class="col mb-4">
                            <div class="card">
                                <a href="detail?pid=<?php echo $related_product['id']; ?>">
                                    <img src="../admin/image/<?php echo $related_product['image']; ?>" alt="" class="card-img-top">
                                </a>
                                <h3><?php echo $related_product['name']; ?></h3>
                                <p><?php echo $related_product['price']; ?> Kč</p>
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
                        </div>
            <?php
                    }
                } else {
                    echo "<p class='text-center'>Žádné další produkty ve stejné kategorii</p>";
                }
            }
            ?>
        </div>
    </div>
</section>
<?php include "../includes/footer.php" ?>