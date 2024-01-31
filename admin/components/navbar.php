<?php $current_page = basename($_SERVER['REQUEST_URI'], '.php');
 ?>

<nav class="navbar navbar-expand-lg bg-dark navbar-admin">
  <div class="container-fluid">
    <a class="navbar-brand logo" href="/admin/dashboard">Admin <span>panel</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <a class="nav-link <?php echo ($current_page === 'orders') ? 'active text-secondary fw-bold' : ''; ?>" href="/admin/orders">Objednávky</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($current_page === 'users') ? 'active text-secondary fw-bold' : ''; ?>" href="/admin/users">Zákazníci</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($current_page === 'messages') ? 'active text-secondary fw-bold' : ''; ?>" href="/admin/messages">Zprávy</a>
        </li>
    </ul>
</div>
<div class="icons">
        <i class="fa-solid fa-user"></i>
    </div>
    <div class="user-box d-flex ">
        <p class="">uživatel: <span><?php echo $_SESSION['admin_name']; ?></span> </p>
        <p>email: <span><?php echo $_SESSION['admin_email']; ?></span> </p>
        <form method="post" class="logout">
            <button class="btn">odhlásit se</button>
        </form>
    </div>
  </div>
</nav>