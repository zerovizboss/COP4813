<?php
    $EID = $_POST['EID'];
    require_once 'dbConfig.php';
    
    try
    {
        $conn = new PDO("mysql: host=$hostname;dbname=$database;charset=utf8",$username,$password, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        //echo "<h3>You're connected to $database database on $hostname server</h3>";
        $conn->exec("USE " . $database . ";");  
    
        //prepare and execute the sql statement to delete a record by it's EID
        $query = $conn->prepare("DELETE FROM Employment WHERE id=?");
        $query->bindParam(1,$EID);
        $query->execute();
        //$count = $query->rowCount();
    }
    catch(PDOException $pe)
    {
        die($username . "Failed to login on database $database, verify your username and password are correct" . $pe->getMessage());
    }
    
    header("location: index.php");
?>
