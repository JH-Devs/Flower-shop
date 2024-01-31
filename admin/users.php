<?php 
  $pageTitle= "Zákazníci";
    include "./includes/admin-header.php";

    session_start();

    $admin_id = $_SESSION['admin_id'];
    if (!isset($admin_id)) {
        header('location:/auth/login');
    }

?>
<?php include "./components/navbar.php" ?>
produkty

<?php include "./includes/admin-footer.php" ?>
