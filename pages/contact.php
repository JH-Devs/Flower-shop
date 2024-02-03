<?php 
    $pageTitle= "Kontakt";
    include "../includes/header.php";
?>
<section class="contact">
<div class="container">
    <div class="row mt-5 ">
        <div class="col-md-6  bg-light p-5 form">
            <h2>Kontaktní formulář</h2>
            <form action="#" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Jméno</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Předmět</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Zpráva</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn-add w-100">Odeslat</button>
            </form>
        </div>

        <div class="col-md-6 contact-info">
            <h2>Kontaktní informace</h2>
            <p><i class="fa-solid fa-phone text-success"></i>  +420 606 606 606</p>
            <p><i class="fa-solid fa-at text-info"></i> email@email.cz</p>
            <p><i class="fa-solid fa-location-dot text-danger"></i> Ulice 152/45, 777 22 Město, ČR</p>
        </div>
    </div>
</div>

</section>
    <div class="newsletter">
        <?php include "../includes/newsletter.php" ?>
    </div>
<?php include "../includes/footer.php" ?>