<?php 
  $pageTitle= "Nástěnka";
    include "./includes/admin-header.php";

    session_start();

    $admin_id = $_SESSION['admin_id'];
    if (!isset($admin_id)) {
        header('location:/auth/login');
    }

?>


Nástěnka
<?php include "./includes/admin-footer.php" ?>
