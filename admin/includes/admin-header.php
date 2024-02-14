<?php require __DIR__ . '../../../config/config.php'; 

?>
<?php $current_page = basename($_SERVER['REQUEST_URI'], '.php');
    session_start();

    $admin_id = $_SESSION['admin_id'];
    if (!isset($admin_id)) {
        header('location:/auth/login');
    }
    if (isset($_POST['logout'])) {
        session_destroy();
        header('location:/auth/login');
    }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower shop | Admin | <?php echo  $pageTitle; ?> </title>
    <link rel="shortcut icon" href="../../assets/img/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="../admin/admin-style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />

</head>
<body>

<nav class="navbar navbar-expand-lg bg-dark navbar-admin">
  <div class="container-fluid">
    <a class="navbar-brand logo" href="/admin/dashboard">Admin <span>panel</span></a>
    <button class="navbar-toggler menu-mobile" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse navbar-items" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link <?php echo ($current_page === 'dashboard') ? 'active text-secondary fw-bold' : ''; ?>" href="/admin/dashboard">Domů</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($current_page === 'products') ? 'active text-secondary fw-bold' : ''; ?>" href="/admin/products">Produkty</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($current_page === 'categories') ? 'active text-secondary fw-bold' : ''; ?>" href="/admin/categories">Kategorie</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($current_page === 'orders') ? 'active text-secondary fw-bold' : ''; ?>" href="/admin/orders">Objednávky</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($current_page === 'users') ? 'active text-secondary fw-bold' : ''; ?>" href="/admin/users">Zákazníci</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($current_page === 'gallery') ? 'active text-secondary fw-bold' : ''; ?>" href="/admin/gallery">Galerie</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($current_page === 'messages') ? 'active text-secondary fw-bold' : ''; ?>" href="/admin/messages">Zprávy</a>
        </li>
    </ul>
</div>
<div class="user-box">
    <a href="#" class="nav-link" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-user"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-end bg-dark mt-0">
        <li class="dropdown-item"><p class="">uživatel: <span><?php echo $_SESSION['admin_name']; ?></span> </p></li>
        <li class="dropdown-item"> <p>email: <span><?php echo $_SESSION['admin_email']; ?></span> </p></li>
        <li class="dropdown-item">
            <form method="post" action="logout.php" class="logout">
                <button class="btn-logout">odhlásit se</button>
            </form>
        </li>
    </ul>
</div>

</nav>

