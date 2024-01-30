<?php 
  $pageTitle= "Nástěnka";
    include "./includes/header.php";

    session_start();

    $admin_id = $_SESSION['admin_id'];
    if (!isset($admin_id)) {
        header('location:/auth/login');
    }

?>

<section class="dashboard">
    <h1>Toto je nástěnka</h1>
    
</section>

