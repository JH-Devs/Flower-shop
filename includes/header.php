<?php require __DIR__ . '/../config/config.php'; 
  session_start();

  $current_page = basename($_SERVER['REQUEST_URI'], '.php');
  if (empty($current_page)) {
    $current_page = 'index';
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower shop | <?php echo  $pageTitle; ?> </title>
    <link rel="shortcut icon" href="./assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
</head>

<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
    <a class="navbar-brand logo" href="/">
        Flower - shop 
    </a>
    <button class="navbar-toggler menu-mobile" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse navbar-items" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link <?php echo ($current_page === 'index') ? 'active text-secondary fw-bold' : ''; ?>" href="/">Domů</a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?php echo ($current_page === 'products') ? 'active text-secondary fw-bold' : ''; ?>" href="/pages/products">Produkty</a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?php echo ($current_page === 'about') ? 'active text-secondary fw-bold' : ''; ?>" href="/pages/about">O nás</a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?php echo ($current_page === 'gallery') ? 'active text-secondary fw-bold' : ''; ?>" href="/pages/gallery">Galerie</a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?php echo ($current_page === 'checkout') ? 'active text-secondary fw-bold' : ''; ?>" href="/pages/checkout">Pokladna</a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?php echo ($current_page === 'contact') ? 'active text-secondary fw-bold' : ''; ?>" href="/pages/contact">Kontakt</a>
        </li>
    </ul>
</div>
    <div class="user-box">
         <!-- wishlist-->
         <?php 
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id']; // Inicializace proměnné $user_id
    $select_wishlist = mysqli_query($mysqli, "SELECT * FROM `wishlist` WHERE user_id ='$user_id' ") or die('chyba query');
    $wishlist_num_rows = mysqli_num_rows($select_wishlist); // Oprava jména proměnné
}
?>
      <a href="/pages/wishlist" class="nav-link" role="button">
        <i class="fa-solid fa-heart"></i> <span>(<?php echo $wishlist_num_rows ?? 0; ?>)</span>
      </a>

      <!-- košík -->
        <?php 
        if (isset($_SESSION['user_id'])) {
        $select_cart = mysqli_query($mysqli, "SELECT * FROM `cart` WHERE user_id ='$user_id' ") or die('chyba query');
        $cart_num_rows = mysqli_num_rows($select_cart);
        }
        ?>
      <a href="/pages/cart" class="nav-link" role="button">
        <i class="fa-solid fa-cart-shopping"></i> <span>(<?php echo $cart_num_rows ?? 0; ?>)</span>
      </a>

    <?php if (isset($_SESSION['user_id'])) { ?>
        <!-- Pokud je uživatel přihlášen -->
        <a href="#" class="nav-link " role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-user"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end bg-light mt-0">
            <li class="dropdown-item">
                <p class="">uživatel: <span><?php echo $_SESSION['user_name']; ?></span> </p>
            </li>
            <li class="dropdown-item">
                <p>email: <span><?php echo $_SESSION['user_email']; ?></span> </p>
            </li>
            <li class="dropdown-item">
                <form method="post" action="/auth/logout" class="logout">
                    <button class="btn-logout" name="logout">odhlásit se</button>
                </form>
            </li>
        </ul>
    <?php } else { ?>
        <!-- Pokud uživatel není přihlášen -->
        <a href="#" class="nav-link" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-user"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end mt-0">
            <li class="dropdown-item">
                <a href="/auth/login">Přihlášení</a>
            </li>
            <li class="dropdown-item">
                <a href="/auth/register">Registrace</a>
            </li>
        </ul>
    <?php } ?>
</div>


</nav>

<body>