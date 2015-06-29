<?php
session_start();
    $login = $_SESSION['login'];
    if ($login==""){
        header("location: index.php?error=2");
    }
    
    $ticker = $_POST['ticker'];
    $fp = fopen("dataSet.dat",'r');
    $i = 0;
    
    while($line = fgets($fp)){
          $tickerArray[$i] = strtok($line, ",");
          $sharesArray[$i] = strtok(",");
          $todayArray[$i] = strtok(",");
          $i++;
    }
    fclose($fp);
    
    $fp = fopen("dataSet.dat",'w');
    
    for($j=0; $j<$i; $j++){
        if($ticker != $tickerArray[$j]){
            //echo "$ticker tick";
            fwrite($fp,"$tickerArray[$j],$sharesArray[$j],$todayArray[$j],");
        }
    }
    fclose($fp);
    header('location: profile.php');
?>
