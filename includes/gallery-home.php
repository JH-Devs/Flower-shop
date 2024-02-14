

<h1 class="title text-center mt-4">Galerie </h1>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 m-4 ">
        <?php 
        $select_gallery = mysqli_query($mysqli, "SELECT * FROM `gallery` ORDER BY created_at DESC LIMIT 8") or die ('chyba query');
        if(mysqli_num_rows($select_gallery) > 0) {
            while($fetch_gallery = mysqli_fetch_assoc($select_gallery)) {
        ?>
        
        <div class="col mb-4 ">
            <div class="card">
            <img src="../admin/image/gallery<?php echo $fetch_gallery['image']; ?>" data-fancybox="gallery" alt="" class="card-img-top">

                <h3><?php echo $fetch_gallery['name']; ?></h3>
               
            </div>
        </div>
        <?php 
            }
        }
        ?>
    </div>

