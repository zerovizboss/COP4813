<?php
    require_once 'dbConfig.php';
    
    try
    {
        
        /*$EID = $_POST['EID'];
        $emp = $_post['emp'];
        $sDate = $_POST['sDate'];
        $fDate = $_POST['fDate'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $position = $_POST['position'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        echo $EID, $emp, $sDate, $fDate, $address, $city, $address, $state, $position, $email, $phone;*/
        
        /*if($EID != '')
        {*/
            $conn = new PDO("mysql: host=$hostname;dbname=$database;charset=utf8",$username,$password, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            $conn->exec("USE " . $database . ";");
            
            $stmt = "UPDATE Employment "
                    . "SET Employer='" . $_POST['emp'] . "',"
                    . "StartDate='" . $_POST['sDate'] . "',"
                    . "FinishDate='" . $_POSE['fDate'] . "',"
                    . "Address='" . $_POST['address'] . "',"
                    . "City='" . $_POST['city'] . "',"
                    . "State='" . $_POST['state'] . "',"
                    . "Position='" . $_POST['position'] . "',"
                    . "Email='" . $_POST['email'] . "',"
                    . "Phone='" . $_POST['phone'] . "',"
                    . "WHERE id='" . $_POST['EID'] . "';";
            echo $stmt;
            $sqlUpdate = $conn->prepare($stmt);
            /*$sqlUpdate->bindParam(10, $EID);
            $sqlUpdate->bindParam(1, $emp);
            $sqlUpdate->bindParam(2, $sDate);
            $sqlUpdate->bindParam(3, $fDate);
            $sqlUpdate->bindParam(4, $address);
            $sqlUpdate->bindParam(5, $city);
            $sqlUpdate->bindParam(6, $state);
            $sqlUpdate->bindParam(7, $position);
            $sqlUpdate->bindParam(8, $email);
            $sqlUpdate->bindParam(9, $phone);*/
            $sqlUpdate->execute();
            
            header("location: index.php");
        /*}
        else
        {
            echo header('location: addRecord.php');
        }*/
    }
    catch(PDOException $pe)
    {
        die($username . "Failed to login on database $database, verify your username and password are correct" . $pe->getMessage());
    }
    
    
?>
