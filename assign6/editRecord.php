<?php    
    require_once 'dbConfig.php';
    
    try
    {
        $conn = new PDO("mysql: host=$hostname;dbname=$database;charset=utf8",$username,$password, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        
        $conn->exec("USE " . $database . ";");
        
        $query = "SELECT * FROM Employment ";
        $query = $query . "WHERE id=" . $_POST['EID'] . ";";

        //store results after submitting the query to the server database using the connection
        $results = $conn->prepare($query);
        $results->execute();
        foreach($results->fetchAll(pdo::FETCH_ASSOC) as $row)
        {
            $EID = $row['EID'];
            $emp = $row['Employer'];
            $address = $row['Address'];
            $city = $row['City'];
            $state = $row['State'];
            $sDate = $row['StartDate'];
            $fDate = $row['FinishDate'];            
            $position = $row['Position'];
            $email = $row['Email'];
            $phone = $row['Phone'];
        }
    }
    catch(PDOException $pe)
    {
        die($username . "Failed to login on database $database, verify your username and password are correct" . $pe->getMessage());
    }
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
        <title>Update Records</title>
        <link href="http://cop4813.ccec.unf.edu/~N00816280/cop4813/ePortfolio.css" rel="Stylesheet" type="text/css" media="screen">
    </head>
    <body>
        <form action="modifyRecord.php" method='POST'>
            <div><input type='hidden' name='EID' value='<?php echo $_POST['EID']; ?>'></div>
            <table>
                <tr>
                    <td>Employer</td><td><input type="text" name="emp" value='<?php echo $emp; ?>'></td>
                </tr>
                <tr>
                    <td>Address</td><td><input type="text" name="address" value='<?php echo $address; ?>'></td>
                </tr>
                <tr>
                    <td>City</td><td><input type="text" name="city" value='<?php echo $city; ?>'></td>
                </tr>
                <tr>
                    <td>State</td><td><input type="text" name="state" value='<?php echo $state; ?>'></td>
                </tr>
                <tr>
                    <td>Start Date</td><td><input type="date" name="sDate" value='<?php echo date_format($sDate, 'mm-dd-yyyy'); ?>'></td>
                </tr>
                <tr>
                    <td>Finish Date</td><td><input type="date" name="fDate" value='<?php echo date($fDate); ?>'></td>
                </tr>
                <tr>
                    <td>Position</td><td><input type="text" name="position" value="<?php echo $position; ?>"></td>
                </tr>
                <tr>
                    <td>Email</td><td><input type="text" name="email" value='<?php echo $email; ?>'></td>
                </tr>
                <tr>
                    <td>Phone</td><td><input type="text" name="phone" value='<?php echo $phone; ?>'></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Save"></td><td></td>
                </tr>
            </table>
            
        </form>
    </body>
</html>
