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
    
    $query = "DELETE FROM PERSONS ";
    $query = $query . "WHERE ID=" . $PID;
    
    //submit the query to the server database using the connection
    mysql_query($query, $mysql_access);
    
    //ensure disconnection from the database when done...turn off the lights when you leave.
    mysql_close($mysql_access);
    header("location: index.php");
?>
