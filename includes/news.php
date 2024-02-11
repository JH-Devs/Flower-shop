
    <h1 class="title text-center mt-4">Novinky </h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 m-4 ">
        <?php 
        $select_products = mysqli_query($mysqli, "SELECT * FROM `products` ORDER BY created_at DESC LIMIT 8") or die ('chyba query');
        if(mysqli_num_rows($select_products) > 0) {
            while($fetch_products = mysqli_fetch_assoc($select_products)) {
        ?>
        
        <div class="col mb-4 ">
            <div class="card">
                <a href="detail?pid=<?php echo $fetch_products['id']; ?>">
                <img src="./admin/image/<?php echo $fetch_products['image']; ?>" alt="" class="card-img-top">
                </a>
                <h3><?php echo $fetch_products['name']; ?></h3>

                <p><?php echo $fetch_products['price']; ?> Kč</p>

                <div class="action-icons">

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
        }
        ?>
    </div>

