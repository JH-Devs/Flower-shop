<?php 
    $pageTitle= "Registrace";
    include "../includes/header.php"
?>
<section class="form-container">
    <form action="" method="post">
        <h3>Registrace</h3>
        <input type="text" name="name" placeholder="vaše jméno" required >
        <input type="email" name="email" placeholder="váš email" required >
        <input type="password" name="password" placeholder="zvolte heslo" required >
        <input type="password" name="cpassword" placeholder="zopakujte heslo" required >
        <input type="submit" name="submit-btn" class="btn" value="registrovat" >
        <p>Máte zde účet? <a href="/login.php">Přihlášení</a></p>
    </form>
</section>


<?php require "../includes/footer.php" ?>