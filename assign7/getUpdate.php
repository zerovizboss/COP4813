<?php
    $EID = $_GET['selection'];
    
    require_once 'dbConfig.php';
    //require 'dbConfig.php';
    try
    {
        $conn = new PDO("mysql: host=$hostname;dbname=$database;charset=utf8",$username,$password, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        //echo "<h3>$username successfully connected to $database database on $hostname server</h3>";
        
        $conn->exec("USE " . $database . ";");        
        
        $query = "SELECT * FROM Employment WHERE id=" . $EID . ";";
        $sqlStmt = $conn->prepare($query);
        $sqlStmt->execute();
        $sqlStmt->fetchAll(PDO::FETCH_ASSOC);
        
        print "<table>";
        print "<caption>Employment History</caption>";
        print "<tr>"
                . "<th></th>"
                . "<th>Employer</th>"
                . "<th>Address</th>"
                . "<th>City</th>"
                . "<th>State</th>"
                . "<th>Start Date</th>"
                . "<th>Finish Date</th>"                                
                . "<th>Position</th>"
                . "<th>Email</th>"
                . "<th>Phone</th>"
                . "</tr>";
        foreach($results as $row)
        {
            $EID = $row['id'];
            $emp = $row['Employer'];
            $address = $row['Address'];
            $city = $row['City'];
            $state = $row['State'];
            $sDate = $row['StartDate'];
            $fDate = $row['FinishDate'];                            
            $position = $row['Position'];
            $email = $row['Email'];
            $phone = $row['Phone'];

            print "<tr>";
            print "<td><input type='radio' name='EID' value='$EID'></td>";
            print "<td>$emp</td>";
            print "<td>$address</td>";
            print "<td>$city</td>";
            print "<td>$state</td>";
            print "<td>$sDate</td>";
            print "<td>$fDate</td>";                            
            print "<td>$position</td>";
            print "<td>$email</td>";
            print "<td>$phone</td>";
            print "</tr>";
        }
        print "</table>";
    }
    catch(PDOException $pe)
    {
        die($username . "Failed to login on database $database, verify your username and password are correct" . $pe->getMessage());
    }
?>