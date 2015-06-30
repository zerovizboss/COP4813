<?php
    $PID = $_POST['personID'];
    
    //connections string to access the backend database
    $mysql_access = mysql_connect('localhost','N00816280','cop816280');
    if (!$mysql_access)
    {
        die('Unable to connect to mySQL database ' . mysql_error());
    }
    
    //select my database
    mysql_select_db('N00816280');
    
    $query = "SELECT * FROM Persons";
    $query = $query . "WHERE ID=" . $PID;
    
    //store results after submitting the query to the server database using the connection
    $results = mysql_query($query, $mysql_access);

    $row = mysql_fetch_row($results);
    
    $personID = $row[0];
    $fName = $row[1];
    $lName = $row[2];
    $email = $row[3];
    $address = $row[4];
    $city = $row[5];
    $state = $row[6];
    $age = $row[7];
    
    mysql_close($mysql_access);
    
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
    </head>
    <body>
        <form action="modfyRecord.php" method="post">
            <div><input type='hidden' name='personID' value='<?php echo $PID; ?>'></div>
            <table>
                <tr>
                    <td>First Name</td><td><input type="text" name="fname" value='<?php echo $fName ?>'></td>
                </tr>
                <tr>
                    <td>Last Name</td><td><input type="text" name="lname" value='<?php echo $fName ?>'>></td>
                </tr>
                <tr>
                    <td>Email</td><td><input type="text" name="email" value='<?php echo $email ?>'>></td>
                </tr>
                <tr>
                    <td>Address</td><td><input type="text" name="address" value='<?php echo $address ?>'>></td>
                </tr>
                <tr>
                    <td>City</td><td><input type="text" name="city" value='<?php echo $city ?>'>></td>
                </tr>
                <tr>
                    <td>State</td><td><input type="text" name="state" value='<?php echo $state ?>'>></td>
                </tr>
                <tr>
                    <td>Age</td><td><input type="text" name="age" value="<?php echo $age; ?>"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="Update"></td>
                </tr>
            </table>
            
        </form>
    </body>
</html>
