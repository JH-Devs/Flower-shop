<?php 
    $pageTitle= "Kontakt";
    include "../includes/header.php";

    if (isset($_POST['submit-btn'])) {
        $name = mysqli_real_escape_string($mysqli, $_POST['name']);
        $email = mysqli_real_escape_string($mysqli, $_POST['email']);
        $number = mysqli_real_escape_string($mysqli, $_POST['number']);
        $subject = mysqli_real_escape_string($mysqli, $_POST['subject']);
        $message = mysqli_real_escape_string($mysqli, $_POST['message']);

        $select_message = mysqli_query($mysqli, "SELECT * FROM `messages` WHERE name='$name' AND email='$email' AND number='$number' AND subject='$subject' AND message='$message' ") or die("chyba query");

        if(mysqli_num_rows($select_message) > 0) {
            echo 'Zpráva byla odeslána.';
        } else {
            mysqli_query($mysqli, "INSERT INTO `messages` (`user_id`, `name`, `email`, `number`, `subject`, `message`) VALUES ('$user_id', '$name', '$email', '$number', '$subject', '$message')");
        }
    }
?>
<section class="contact">
<div class="container">
    <h1 class="text-center title">Kontakt</h1>
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
                    <label for="number" class="form-label">Telefon</label>
                    <input type="text" class="form-control" id="number" name="number" required>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Předmět</label>
                    <input type="subject" class="form-control" id="subject" name="subject" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Zpráva</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn-add w-100" name="submit-btn">Odeslat</button>
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