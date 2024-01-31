<?php 
  $pageTitle= "Produkty";
    include "./includes/admin-header.php";

  
    session_start();

    $admin_id = $_SESSION['admin_id'];
    if (!isset($admin_id)) {
        header('location:/auth/login');
    }

?>

produkty

<?php include "./includes/admin-footer.php" ?>
