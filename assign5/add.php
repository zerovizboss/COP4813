<?php
    session_start();
    $login = $_SESSION['login'];
    if ($login==""){
        header("location: index.php?error=2");
    }
    
    $ticker = $_POST['ticker'];
    $shares = $_POST['shares'];
    $today = date("dd/mm/yyyy");
    
    $fp = fopen("dataSet.dat",'a');
    
    fwrite($fp,"$ticker,$shares,$today\n");
    
    fclose($fp);
    
    header('location: profile.php');
?>
