<?php
session_start();
    $login = $_SESSION['login'];
    if ($login==""){
        header("location: index.php?error=2");
    }
    
    $myFile = "dataSet.dat";
    $arrData = array("Tick", "Shares", Date);
    if($_POST['Update'])//submits the form
        {
            $ct = 0;
            foreach($_POST as $record){
                $ct++;
                if($record != "Update"){
                    $elements .= $record;
                }
                if($ct == count($arrData)){
                    $elements .= "\r\n"; $ct=0;
                }
                if($ct !=0 && $record != "Update"){
                    $elements .= ",";
                }
            }
            $fh = fopen("dataSet.dat","w+");
            fwrite($fh,$elements);
            fclose($fh);
            
            $fh = fopen("dataSet.dat","r");
            $datUpdate = explode("\r\n",fread($fh,filesize($myFile)));
            fclose($fh);
            for($i=0; $i<count($datUpdate); $i++)
            {
                $results[] = explode(",",$datUpdate[$i]);
            }
            for($k=0; $k<count($arrData); $k++)
            {
                $header .= "<th style='border-bottom: 2px solid #000;'>$arrData[$k]</th>";
            }
            echo "<form action='#' method ='post'><table border=0 cellpadding=3 rules='cols'><tr>$header</tr>";
            
            for($i=0; $i<count($results); $i++)
            {
                echo "<tr>";
                for($j=0; $j<count($results[$i]); $j++)
                {
                    if($results[$i][$j])
                    {
                        echo "<td align='center'><input name='" . $arrData[$j] . "' " . $i . " value='" . $results[$i][$j] ."'></td>";
                    }
                    else
                    {
                        echo header("location: profile.php");
                    }
                }
                echo "</tr>";
            }
            echo "</table>";
            //echo header("location: profile.php");
        }
            
            
            /*$ticker = $_POST['ticker'];//receives the ticker symbol from the text input
            $shares = $_POST['shares'];
            $fp = fopen("dataSet.dat",'w+');//opens the data file with update permission
            foreach($fp as $index){
                echo "Index: " . $index;
                fwrite ($fp, $ticker,$shares);//writes the input to the file pointer/handler
            }*/
            
            
            //fclose($fp);//don't keep the text file open
            /*echo "Updated File: <br>";
            $file = file("dataSet.dat");//assign the updated text file to a temporary location
            foreach($file as $tick)//displays each text file record individually
            {
                echo $tick;
            }
        }
    else
        {
        $file = file("dataSet.dat");
        
            {
            echo ("<form action='change.php' method='post'>");
            foreach($file as $tick){
                echo "<ul><li>$tick</li></ul>";
            }
            echo ("</form>");
            }
        //header("location: profile.php");
        }*/
    //echo header('location:profile.php');
    /*for($j=0; $j<$i; $j++){
        if($ticker === $tickerArray[$j]){
            fwrite($fp,"$tickerArray[$j],$sharesArray[$j],$todayArray[$j],");
            echo "updated: " . fgets($fp);
        }
    }
    fclose($fp);*/
   
    /*while($line = fgets($fp)){
        echo "record being read in: $line";
        $arrTicker[$i] = strtok($line, ",");
        $arrShares[$i] = strtok(",");
        $arrToday[$i] = strtok(",");
        echo "parsed array elements: $arrTicker, $arrShares, $arrToday";
        for($j=0; $j<$i; $j++){
            if($ticker === $arrTicker[$i]){
                $open = fopen("dataSet.dat, 'w+'");
                echo "Stock Tick being updated: $arrTicker[$i]";
                fwrite($open,"$arrTicker[$i],$arrShares[$i],$arrToday[$i]");
                echo "Stock changed: $arrTicker[$i], $arrShares[$i], $arrToday[$i]";
                fclose($open);
        }
        $i++;
    }*/
    //fclose($fp);
    //header("location: profile.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Stock Update</title>
    </head>
    <body>
        <form action="change.php" name="Update" method="post">
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
                <input type="submit" name="Update" value="Update">
            </div>
        </form>
        <?php
        /*$i = 0;
        
        $fp = fopen("dataSet.dat", 'w');
        
        while($line = fgets($fp)){
        $dataSetArray[$i] = strtok($line, ",");
        $dataSetArray[$i] = strtok(",");
        $dataSetArray[$i] = strtok(",");
        for($j=0; $j<$i; $j++){
            if($ticker == $dataSetArray[$j]){
                //echo "$ticker tick";
                fwrite($fp,"$dataSetArray[$j],$dataSetArray[$j],$dataSetArray[$j],");
            }
        }
        $i++;
        }
        fclose($fp);
        echo "$dataSetArray[j] was updated";
         */
        ?>
    </body>
</html>