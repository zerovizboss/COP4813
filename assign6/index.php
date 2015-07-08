<?php
    require_once 'dbConfig.php';
    //$username = "N00816280";
    //$password = "cop816280";
    //$hostname = "localhost";
    //$database = "N00816280";
    
    try
    {
        $conn = new PDO("mysql: host=$hostname; dbname=$database; charset=utf8",$username,$password, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        echo "Successfully connected to $hostname on database $database";
    }
    catch(PDOException $pe)
    {
        die($username . "Failed to login on database $database, verify your username and password are correct" . $pe->getMessage());
    }
    
    //Create Table
    $sqlStmt = $conn->prepare("CREATE TABLE IF NOT EXISTS Employment(id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,mime VARCHAR(255) NOT NULL, Employer VARCHAR(30) NOT NULL,StartDate DATE,FinishDate DATE,Address VARCHAR(50),City VARCHAR(30),State VARCHAR(3),Title VARCHAR(30),Email VARCHAR(30),Phone VARCHAR(15));");
    $sqlStmt->execute();
    $conn = NULL;
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
                //create sql statements
                $query = $conn->prepare("SELECT * FROM Employment;");
                $query->execute();

                //store results after submitting the query to the server database using the connection
                $results = $query->fetch(PDO::FETCH_ASSOC);

                //display the data
                echo "<table border='1'>";
                foreach($results as $empRecord)
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
                $conn = NULL;
            ?>
            <div>
                <input type='button' onClick='deleteRecord()' value='Delete'>
                <input type='button' onClick='editRecord()' value='Edit'>
            </div>
        </form>
    </body>
</html>
