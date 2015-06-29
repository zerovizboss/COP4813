<?php
    session_start();
        $userLogin = $_POST['username'];
        $pwd = $_POST['password'];

        if('Donny'==$userLogin && 'cop816280' == $pwd){
            $_SESSION['login']=$userLogin;
            header('location: profile.php'); //successful login redirects to the protected page
        }
        else{
            header('location: index.php?error=1');
        }
?>
