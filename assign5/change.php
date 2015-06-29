<?php
session_start();
    $login = $_SESSION['login'];
    if ($login==""){
        header("location: index.php?error=2");
    }
    
    $ticker = $_POST['ticker'];
    $shares = $_POST['shares'];
    $today = date("d.m.y");
    
    $fp = fopen("dataSet.dat",'r');
    $i = 0;
    
    while($line = fgets($fp)){
          $tickerArray[$i] = strtok($line, ",");
          $sharesArray[$i] = strtok(",");
          $todayArray[$i] = strtok(",");
          $i++;
    }
    fclose($fp);
    
    $fp = fopen("dataSet.dat",'w+');
    
    for($j=0; $j<$fp[$i]; $j++){
        if($ticker == $fp[$j])
        {
            $ticker = $tickerArray[$j];
            $shares = $sharesArray[$j];
            $today = $todayArray[$j];
            fwrite($fp[$j],"$ticker,$shares,$today");
        }
    }
    echo "$ticker with $shares is being on $today date";
    fclose($fp);
    //header('location: profile.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Stock Update</title>
    </head>
    <body>
        <form action="" name="Update" method="post">
            <table>
                <tr>
                    <td>Ticker: </td><td><input type='text' name='ticker'></td>
                </tr>
                <tr>
                    <td>
                        Shares: </td><td><input type='number' name='shares'></td>
                </tr>
            </table>
            <br>
            <div>
                <input type="submit" name="Update" onClick="editStock()" value="Update">
            </div>
        </form>
    </body>
    
    
</html>