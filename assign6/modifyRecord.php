<?php
    $EID = $_POST['EID'];
    $emp = $_post['emp'];
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
        if($EID !== '')
        {
            $conn = new PDO("mysql: host=$hostname;dbname=$database;charset=utf8",$username,$password, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            $conn->exec("USE " . $database . ";");  

            $stmt = "UPDATE Employment ";
            $stmt = $stmt . "SET Employer='?',StartDate='?',FinishDate='?',Address='?',City='?',State='?',Position='?',Email='?',Phone='?' ";
            $stmt = $stmt . "WHERE id='?';";

            $sqlUpdate = $conn->prepare($stmt);
            $sqlUpdate->bindParam('EID', $EID);
            $sqlUpdate->bindParam('Employer', $emp);
            $sqlUpdate->bindParam('StartDate', $sDate);
            $sqlUpdate->bindParam('FinishDate', $fDate);
            $sqlUpdate->bindParam('Address', $address);
            $sqlUpdate->bindParam('City', $city);
            $sqlUpdate->bindParam('State', $state);
            $sqlUpdate->bindParam('Position', $position);
            $sqlUpdate->bindParam('Email', $email);
            $sqlUpdate->bindParam('phone', $phone);
            $sqlUpdate->execute();
            
            header("location: index.php");
        }
        else
        {
            echo header('location: addRecord.php');
        }
    }
    catch(PDOException $pe)
    {
        die($username . "Failed to login on database $database, verify your username and password are correct" . $pe->getMessage());
    }
    
    
?>
