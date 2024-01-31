<?php 
    $pageTitle= "Homepage";
    include "./includes/header.php";
?>
<?php 
    session_start();

    $user_id = $_SESSION['user_id'];
    if (!isset($user_id)) {
        header('location:/auth/login');
    }

?>


<?php include "./includes/footer.php" ?>