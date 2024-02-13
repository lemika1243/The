<?php
    include "../Function/function_Login.php";
    $email = $_POST['email'];
    $mdp = $_POST['password'];
    $path = checkLogin($email, $mdp);
    header('Location:../'.$path.'.php'); 
?>