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
        function addStock()
        {
            document.addForm.action='add.php';
            document.addForm.submit();
        }
	function editStock()
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
            <form id='stockQuote' action='' method='post' name="addForm">
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
                <div><input type="submit" onclick="addStock()" value="Add Stock Tick"><input type="reset" value="clear"></div>
            </form>
            <form action='' method='post' name="myForm">
                <div>

                    <?php
                        $fp = fopen("dataSet.dat", "r");
                            echo "$login has the following shares of stock:\n";
                            echo "<ul>";

                            while($line = fgets($fp)){
                                $ticker = strtok($line, ",");
                                $shares = strtok(",");
                                $today = strtok(",");
                                $open = fopen("http://finance.yahoo.com/d/quotes.csv?s=$ticker&f=sl1d1t1c1ohgv&e=.csv","r");
				$stock_info = fgets($open);
				$value = strtok($stock_info, ",");
				$value =  strtok(",");
				$total_value = $shares * $value;
                                $totalPortfolio += $total_value;

                               echo "<li><input type='radio' value='$ticker' name='ticker'> $shares shares of $ticker stock as of $today the value is $value worth $total_value</li>";                         
                            }
                            echo "</ul>";
                            echo "$login Portfolio networth is $totalPortfolio";
                            fclose($fp);
                    ?>
                </div>
                <div>
                    <input type="submit" onClick="deleteStock()" value="Delete"><input type="submit" onClick="editStock()" value="Change">
                </div>
            </form>
        </div>
        <footer>
            <b id="logout"><a href="logout.php">Log Out</a></b>
        </footer>
    </body>
</html>
