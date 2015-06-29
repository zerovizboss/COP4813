<?php
    $PID = $_POST['personID'];
    $fName = $_POST['fname'];
    $lName = $_POST['lname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $age = $_POST['age'];
    
    //connections string to access the backend database
    $mysql_access = mysql_connect('localhost','N00816280','cop816280');
    if (!$mysql_access)
    {
        die('Unable to connect to mySQL database ' . mysql_error());
    }
    
    //select my database
    mysql_select_db('N00816280');
    
    $query = "UPDATE Persons";
    $query = $query . "SET FirstName='$fName', LastName='$lName', Email='$email', Address='$address', City='$city',State='$state',Age='$age'";
    $query = $query . "WHERE personID=" . $PID;
    
    //submit the query to the server database using the connection
    mysql_query($query, $mysql_access);
    
    //ensure disconnection from the database when done...turn off the lights when you leave.
    mysql_close($mysql_access);
    header("location: index.php");
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
        <?php
        // put your code here
        ?>
    </body>
</html>
