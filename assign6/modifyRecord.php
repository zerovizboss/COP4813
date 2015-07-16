<?php
    require_once 'dbConfig.php';
    
    try
    {
        
        if($_POST['EID'] != '')
        {
            $conn = new PDO("mysql: host=$hostname;dbname=$database;charset=utf8",$username,$password, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            $conn->exec("USE " . $database . ";");
            
            $stmt = "UPDATE Employment "
                    . "SET Employer='" . $_POST['emp'] . "',"
                    . "Address='" . $_POST['address'] . "',"
                    . "City='" . $_POST['city'] . "',"
                    . "State='" . $_POST['state'] . "',"
                    . "StartDate='" . $_POST['sDate'] . "',"
                    . "FinishDate='" . $_POSE['fDate'] . "',"                    
                    . "Position='" . $_POST['position'] . "',"
                    . "Email='" . $_POST['email'] . "',"
                    . "Phone='" . $_POST['phone'] . "',"
                    . "WHERE id=" . $_POST['EID'];
            
            $sqlUpdate = $conn->prepare($stmt);
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
