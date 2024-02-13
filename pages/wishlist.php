<?php 
    $pageTitle= "Seznam přání";
    include "../includes/header.php";

     /* přidání produktu na wishlist */
 if (isset($_SESSION['user_id'])) {
   
    /* přidání produktu do košíku */
    if (isset($_POST['add_to_cart'])) {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity =1;

        $cart_number = mysqli_query($mysqli, "SELECT * FROM `cart` WHERE name='$product_name' AND user_id ='$user_id' ") or die ('chyba query');
       if (mysqli_num_rows($cart_number)>0){
            $message[]='produkt je už v košíku';
        } else {
            mysqli_query($mysqli, "INSERT INTO `cart`(`user_id`, `pid`, `name`, `price`, `image`, `quantity`) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_image', '$product_quantity')");
            $message[] = 'produkt byl přídán do košíku';
        }

    }
    /* smazání ze seznamu přání */
    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];

        mysqli_query($mysqli, "DELETE FROM `wishlist` WHERE id='$delete_id' ") or die ('chyba query');
        header('location:/pages/wishlist');
    }
    /* smazání všeho ze seznamu přání */
    if (isset($_GET['delete_all'])) {

        mysqli_query($mysqli, "DELETE FROM `wishlist` WHERE user_id='$user_id' ") or die ('chyba query');
        header('location:/pages/wishlist');
    }

}
?>
<section class="products">
<div class="container-fluid">
   
<h1 class="title text-center mt-4">Seznam přání</h1>
<?php include "../includes/banner.php" ;?>

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
        <?php 
        $grand_total = 0;
        $select_wishlist = mysqli_query($mysqli, "SELECT * FROM `wishlist` WHERE user_id= '$user_id' ") or die ('chyba query');
        if(mysqli_num_rows($select_wishlist) > 0) {
            while($fetch_wishlist = mysqli_fetch_assoc($select_wishlist)) {
        ?>
        
        <form action="" method="post">
        <div class="col mb-4 ">
            <div class="card">
            <a href="/pages/detail?pid=<?php echo $fetch_wishlist['id']; ?>">
                <img src="../admin/image/<?php echo $fetch_wishlist['image']; ?>" alt="" class="card-img-top">
            </a>
                <h3><?php echo $fetch_wishlist['name']; ?></h3>
                <p><?php echo $fetch_wishlist['price']; ?> Kč</p>

                <input type="hidden" name="product_id" value="<?php echo $fetch_wishlist['id'] ?>">
                <input type="hidden" name="product_name" value="<?php echo $fetch_wishlist['name'] ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_wishlist['price'] ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_wishlist['image'] ?>">

                <div class="action-icons">

                <a href="/pages/detail?pid=<?php echo $fetch_wishlist['id']; ?>"><i class="fa-solid fa-eye text-info"></i></a>

                <a href="/pages/wishlist?delete=<?php echo $fetch_wishlist['id'] ?>" class=" delete" onclick=" return confirm('produkt byl smazán');"><i class="fa-solid fa-trash-can text-danger"></i></a>

                <button type="submit" name="add_to_cart" class="btn-icon">
                <i class="fa-solid fa-cart-shopping text-success"></i>
                </button>
                </div>
            </div>
            </form>
        </div>
        <?php 

        $grand_total+= $fetch_wishlist['price'];
            }
        } 
        ?>
    </div>
    <div class="wishlist-price">
    <p>Celková částka na seznamu přání: <span><?php echo $grand_total ?> Kč</span></p>
    </div>
        <div class="wishlist-total">
           <button> <a href="pages/products">pokračovat v nákupu</a></button>
            <button><a href="/pages/wishlist?delete_all" class="<?php echo ($grand_total > 1)?'':'disabled'; ?> " onclick="return confirm('opravdu vše smazat?')">smazat vše</a></button>
        </div>

</div>
</section>
<?php include "../includes/footer.php" ?>