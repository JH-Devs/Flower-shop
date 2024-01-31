<?php $current_page = basename($_SERVER['REQUEST_URI'], '.php');
 ?>

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
   <div class="user-box">
   <a href="#" class="nav-link" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-user"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end bg-dark mt-0">
            <li class="dropdown-item "><p class="">uživatel: <span><?php echo $_SESSION['admin_name']; ?></span> </p></li>
            <li class="dropdown-item"> <p>email: <span><?php echo $_SESSION['admin_email']; ?></span> </p></li>
            <li class="dropdown-item"><form method="post" class="logout">
            <button class="btn-logout">odhlásit se</button>
        </form></li>
        </ul>
    </li>
   </ul>
  </div>
</nav>

