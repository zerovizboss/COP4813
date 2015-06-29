<?php
session_start();
    $login = $_SESSION['login'];
    if ($login==""){
        header("location: index.php?error=2");
    }
    
    $ticker = $_POST['ticker'];
    
    //opens the data file and inserts the data into an array for indexing and manipulation
    //$fp = fopen("dataSet.dat",'r');
    $i = 0;
   
    $open = fopen("dataSet.dat","r");//opens the data array to update the current records by their index
    echo "$open dataSet file";
    while($line = fgets($open)){
          $tickerArray[$i] = strtok($line, ",");
          $sharesArray[$i] = strtok(",");
          $todayArray[$i] = strtok(",");
          $i++;
    }
    
    echo "$tickerArray[$i] stock tick";
    foreach($open as $stockTick)
    {
        if($ticker == $tickerArray[$stockTick])
        {
            /*$ticker = strtok($line,",");
            $shares = strtok(",");
            $today = date("d.m.y");*/
            fwrite($fp,"$ticker,$shares,$today\n");
        }
        else
        {
            echo $error="location: index.php?error=3";
            exit;
        }
    }
    /*for($k=0; $k<$fp.length; $k++){
        if($ticker == $tickerArray[$k]){
            $tickerArray[$k] = strtok($line,",");
            $sharesArray[$k] = strtok(",");
            $todayArray[$k] = strtok(",");
            echo "$tickerArray[$k], $sharesArray[$k], $todayArray[$k]";
            fwrite($fp,"$tickerArray[$k],$sharesArray[$k],$todayArray[$k]");
        }
    }*/
    fclose($open);
    header('location: profile.php');
?>