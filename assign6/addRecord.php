<?php
    //$EID = $_POST['EID'];
    $emp = $_POST['emp'];
    $sDate = $_POST['sDate'];
    $fDate = $_POST['fDate'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $position = $_POST['position'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    require_once 'dbConfig.php';
    
    try
    {
        //established a connection instance which keeps the database secure
        $conn = new PDO("mysql: host=$hostname; dbname=$database; charset=utf8",$username,$password, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        
        //sets the current database
        $conn->exec("USE " . $database . ";");

        //prepare the connection with the SQL statement that will be executed using PDO
        $query = "INSERT INTO Employment(Employer,StartDate,FinishDate,Address,City,State,Position,Email,Phone)";
        $query = $query . " VALUES (?,?,?,?,?,?,?,?,?);";
        $sqlStmt = $conn->prepare($query);
        $sqlStmt->bindParam(1,$emp);
        $sqlStmt->bindParam(2,$sDate);
        $sqlStmt->bindParam(3,$fDate);
        $sqlStmt->bindParam(4,$address);
        $sqlStmt->bindParam(5,$city);
        $sqlStmt->bindParam(6,$state);
        $sqlStmt->bindParam(7,$position);
        $sqlStmt->bindParam(8,$email);
        $sqlStmt->bindParam(9,$phone);    
        $sqlStmt->execute(); 
        
    }
    catch(PDOException $pe)
    {
        die($username . "Failed to login on database $database, verify your username and password are correct" . $pe->getMessage());
    }
    echo header('location: index.php');
?>
