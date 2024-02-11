
<h1 class="title text-center mt-4">Top kategorie </h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 m-4 ">
        <?php 
        $select_categories = mysqli_query($mysqli, "SELECT * FROM `categories` ") or die ('chyba query');
        if(mysqli_num_rows($select_categories) > 0) {
            while($fetch_categories = mysqli_fetch_assoc($select_categories)) {
        ?>
        
        <div class="col mb-4 ">
            <div class="card-2">
                <img src="./admin/image/categories/<?php echo $fetch_categories['image']; ?>" alt="" class="card-img-top">
                <h3><?php echo $fetch_categories['name']; ?></h3>
            </div>
        </div>
        <?php 
            }
        }
        ?>
    </div>

