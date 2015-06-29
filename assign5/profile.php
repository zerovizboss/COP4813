<?php
    session_start();
    $login = $_SESSION['login'];
    if ($login==""){
        header("location: index.php?error=2");
    }
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Profile Page</title>
        <script>
	function changeStock()
	{
		document.myForm.action='change.php';
		document.myForm.submit();
	}
        function deleteStock()
        {
                document.myForm.action='delete.php';
                document.myForm.submit();
        }
    </script>
    </head>
    <body>
        <div id="main">
            <b id="welcome">Welcome to the stock ticker : <i><?php echo "$login"; ?></i></b>
            <form id='stockQuote' action='add.php' method='post'>
                <table>
                    <tr>
                        <th>Ticker</th>
                    </tr>
                    <tr>
                        <td>Ticker: </td><td><input type='text' name='ticker'></td>
                    </tr>
                    <tr>
                        <td>
                            Shares: </td><td><input type='number' name='shares'></td>
                    </tr>
                </table>
                <div><input type="submit" onClick="addStock()" value="Add"><input type="reset" value="clear"></div>
            </form>
            <form action='' method='post' name="myForm">
                <div>

                    <?php
                        $fp = fopen("dataSet.dat", "r");

                            echo "<ul>";
                            echo "$login has the following shares of stock:\n";

                            while($line = fgets($fp)){
                                $ticker = strtok($line, ",");
                                $shares = strtok(",");
                                $today = strtok(",");
                                $open = fopen("http://finance.yahoo.com/d/quotes.csv?s=$ticker&f=sl1d1t1c1ohgv&e=.csv","r");
				$stock_info = fgets($open);
				$value = strtok($stock_info, ",");
				$value =  strtok(",");
				$total_value = $shares * $value;

                               echo "<li><input type='radio' value='$ticker' name='ticker'> $shares shares of $ticker stock as of $today the value is $value for a total networth of $total_value</li>";
                               
                            }

                            echo "</ul>";
                            fclose($fp);
                    ?>
                </div>
                <div>
                    <input type="button" onClick="deleteStock()" value="Delete"><input type="button" onClick="changeStock()" value="Change">
                </div>
            </form>
        </div>
        <footer>
            <b id="logout"><a href="logout.php">Log Out</a></b>
        </footer>
    </body>
</html>
