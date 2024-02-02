<?php 
    $pageTitle= "Přihlášení";
    include "../includes/header.php";



    if (isset($_POST['submit-btn'])) {

        $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);
        $email = mysqli_real_escape_string($mysqli, $filter_email);

        $filter_password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
        $password = mysqli_real_escape_string($mysqli, $filter_password);

        $select_user = mysqli_query($mysqli, "SELECT * FROM `users` WHERE email = '$email' ") or die('query failed');

        if (mysqli_num_rows($select_user) > 0) {
            $row = mysqli_fetch_assoc($select_user);
            if ($row['user_type'] == 'admin') {
                $_SESSION['admin_name'] = $row['name'];
                $_SESSION['admin_email'] = $row['email'];
                $_SESSION['admin_id'] = $row['id'];
                header('location:/admin/dashboard');

            } else if($row['user_type'] == 'zákazník') {
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['user_id'] = $row['id'];
                header('location:/');
            } else {
                $message[] = 'neplatný email nebo heslo';
            }
        }
 
    }
    
?>

<section class="form-container">
    <form action="" method="post">
        <h3>Přihlášení</h3>
        <input type="email" name="email" placeholder="váš email" required >
        <input type="password" name="password" placeholder="zvolte heslo" required >
        <input type="submit" name="submit-btn" class="btn" value="přihlásit se" >
       <div class="text-comment">
       <p>Nemáte zde účet? <a href="/auth/register">Registrace</a></p>
       </div>
       <?php 
        if (isset($message)) {
            foreach ($message as $message) {
                echo '
                <div class="message">
                    <span>'.$message.'</span>
                    <i class="fa-solid fa-xmark" onclick="this.parentElement.remove()"></i>
                </div>
                ';
            }
        }
    ?>
    </form>
</section>


<?php require "../includes/footer.php" ?>