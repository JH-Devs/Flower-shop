<?php 
$pageTitle = "Registrace";
include "../includes/header.php";

if (isset($_POST['submit-btn'])) {
    // Filtrace a úprava vstupních dat
    $filter_name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $name = mysqli_real_escape_string($mysqli, $filter_name);

    $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = mysqli_real_escape_string($mysqli, $filter_email);

    $filter_password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
    $password = mysqli_real_escape_string($mysqli, $filter_password);

    $filter_cpassword = filter_var($_POST['cpassword'], FILTER_SANITIZE_SPECIAL_CHARS);
    $cpassword = mysqli_real_escape_string($mysqli, $filter_cpassword);

 
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    $select_user = mysqli_query($mysqli, "SELECT * FROM `users` WHERE email = '$email' ") or die('query failed');

    if (mysqli_num_rows($select_user) > 0) {
        $message[] = 'Uživatel již existuje';
    } else {
        if ($password != $cpassword) {
            $message[] = 'Hesla se neshodují.';
        } else {
         
            mysqli_query($mysqli, "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name', '$email','$hashed_password')") or die('query failed'); 
            $message[] = "Registrace byla úspěšná.";
            header('location:/auth/login.php');
        }
    }
}
?>



<section class="form-container">
    <form action="" method="post">
        <h3>Registrace</h3>
        <input type="text" name="name" placeholder="vaše jméno" required >
        <input type="email" name="email" placeholder="váš email" required >
        <input type="password" name="password" placeholder="zvolte heslo" required >
        <input type="password" name="cpassword" placeholder="zopakujte heslo" required >
        <input type="submit" name="submit-btn" class="btn" value="registrovat" >
        <div class="text-comment">
        <p>Máte zde účet? <a href="/auth/login">Přihlášení</a></p>
        </div>
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
    </form>
</section>


<?php require "../includes/footer.php" ?>