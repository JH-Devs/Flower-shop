<?php 
    $pageTitle= "Přihlášení";
    include "../includes/header.php"
?>
<section class="form-container">
    <form action="" method="post">
        <h3>Přihlášení</h3>
        <input type="email" name="email" placeholder="váš email" required >
        <input type="password" name="password" placeholder="zvolte heslo" required >
        <input type="submit" name="submit-btn" class="btn" value="přihlásit se" >
       <div class="text-comment">
       <p>Nemáte zde účet? <a href="/auth/register.php">Registrace</a></p>
       </div>
    </form>
</section>


<?php require "../includes/footer.php" ?>