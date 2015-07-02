<?php
    $username = "N00816280";
    $password = "cop816280";
    $hostname = "localhost";
    $database = "N00816280";
    $conn = mysql_connect($hostname,$username,$password,False);
    mysql_select_db($database,$conn) or die("Unable to locate database");
    
    if(!$conn)
    {
        die("Failed to connect, verify your username and password are correct " . mysql_connect_error());
    }
    echo "Successful Connection";
    //Create Table
    $sqlStmnt = "CREATE TABLE Employment(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,Employer VARCHAR(30) NOT NULL,StartDate DATE,FinishDate DATE,Address VARCHAR(50),City VARCHAR(30),State(VARCHAR(3),Title VARCHAR(30),Email VARCHAR(30),Phone VARCHAR(15))";
    if(mysql_query($conn,$sqlStmnt))
    {
        mysql_query(show_tables());
    }
    
    mysql_close($conn);
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
        <title></title>
        <script>
        function editRecord()
        {
            document.results.action = "editRecord.php";
            document.results.submit();
        }
        function deleteRecord()
        {
            document.results.action = 'deleteRecord.php';
            document.results.submit();
        }
        </script>
    </head>
    <body>
        <form action="addRecord.php" method="post">
            <table>
                
                <tr>
                    <td>Employer</td><td><input type="text" name="emp"></td>
                </tr>
                <tr>
                    <td>Start Date</td><td><input type="date" name="sDate"></td>
                </tr>
                <tr>
                    <td>Finish Date</td><td><input type="date" name="fDate"></td>
                </tr>
                <tr>
                    <td>Street Address</td><td><input type="text" name="address"></td>
                </tr>
                <tr>
                    <td>City</td><td><input type="text" name="city"></td>
                </tr>
                <tr>
                    <td>State</td><td><input type="text" name="state"></td>
                </tr>
                <tr>
                    <td>Position</td><td><input type="text" name="position"></td>
                </tr>
                <tr>
                    <td>Email</td><td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <td>Phone</td><td><input type="text" name="phone"></td>
                </tr>
                <tr>
                    <td><input type='number' name='empID' hidden=''></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="Add Record"><input type="reset" value="clear"></td>
                </tr>
            </table>
            
        </form>
        <form action='' method='post' name='results'>
            <?php
                //connections string to access the backend database
                $mysql_access = mysql_connect('localhost','N00816280','cop816280');
                if (!$mysql_access)
                {
                    die('Unable to connect to mySQL database ' . mysql_error());
                }

                //select my database
                mysql_select_db('N00816280')or die("Unable to select database");

                //create sql statements
                $query = "SELECT * FROM Persons ";

                //store results after submitting the query to the server database using the connection
                $results = mysql_query($query, $mysql_access);

                //display the data
                echo "<table border='1'>";
                while($row = mysql_fetch_row($results))
                {
                    $empID = $row[0];
                    $emp = $row[1];
                    $sDate = $row[2];
                    $fDate = $row[3];
                    $address = $row[4];
                    $city = $row[5];
                    $state = $row[6];
                    $position = $row[7];
                    $email = $row[8];
                    $phone = $row[9];

                    echo "<tr>";
                    echo "<td><input type='radio' name='empID' value='EID'></td>";
                    echo "<td>emp</td>";
                    echo "<td>sDate</td>";
                    echo "<td>fDate</td>";
                    echo "<td>address</td>";
                    echo "<td>city</td>";
                    echo "<td>state</td>";
                    echo "<td>position</td>";
                    echo "<td>email</td>";
                    echo "<td>phone</td>";
                    echo "</tr>";
                }
                echo "</table>";

                //ensure disconnection from the database when done...turn off the lights when you leave.
                mysql_close($mysql_access);
            ?>
            <div>
                <input type='button' onClick='deleteRecord()' value='Delete'>
                <input type='button' onClick='editRecord()' value='Edit'>
            </div>
        </form>
    </body>
</html>
