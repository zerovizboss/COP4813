<?php
    
    require_once 'dbConfig.php';
    //require 'dbConfig.php';
    try
    {
        $conn = new PDO("mysql: host=$hostname;dbname=$database;charset=utf8",$username,$password, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        //echo "<h3>$username successfully connected to $database database on $hostname server</h3>";
        
        $conn->exec("USE " . $database . ";");        
        
        //Create Table
        $sqlStmt = $conn->prepare("CREATE TABLE IF NOT EXISTS Employment(id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY, Employer VARCHAR(30) NOT NULL,StartDate DATE,FinishDate DATE,Address VARCHAR(50),City VARCHAR(30),State VARCHAR(3),Position VARCHAR(30),Email VARCHAR(30),Phone VARCHAR(15));");
        $sqlStmt->execute();
    }
    catch(PDOException $pe)
    {
        die($username . "Failed to login on database $database, verify your username and password are correct" . $pe->getMessage());
    }
    //$conn=NULL;
    
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
        <title>PHP MySQL Intro Course</title>
        <link href="http://cop4813.ccec.unf.edu/~N00816280/cop4813/ePortfolio.css" rel="Stylesheet" type="text/css" media="screen">
        <!--<script src='/assign6/dbControls.js' type='text/javascript'></script>-->
        <script> 
        function editRecord()
        {
                document.frmResults.action = "editRecord.php";
                document.frmResults.submit();
            
        }
        function deleteRecord()
        {
                document.frmResults.action = "deleteRecord.php";
                document.frmResults.submit();
        }
        function ajax()
        {
            var ajaxRequest;
            
            try
            {
                ajaxRequest = new XMLHttpRequest();
                
            }
            catch(e)
            {
                try
                {
                    ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                }
                catch(e)
                {
                    try
                    {
                        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    catch(e)
                        {
                            alert ("Please verify your browser is updated!");
                            return false;
                        }
                }
            }
        }
        ajaxRequest.onreadystatechange = function()
        {
            if (ajaxRequest.readyState == 4)
            {
                document.getElementById("output").innerHTML = ajaxRequest.responseText;
            }
        }
        var selection document.frmResults.empHistory.value;
        
        ajaxRequest.open("GET", "getUpdate.php?selection=" + selection, true);
        ajaxRequest.send(NULL);
        
        </script>
    </head>
    <body>
        <form action='addRecord.php' method="post">
            <table>
                <caption>Add Employment Form</caption>
                <tr>
                    <th>Employment History</th><td><input type='number' name='EID' hidden=''></td>
                </tr>
                <tr>
                    <td>Employer</td><td><input type="text" name="emp"></td>
                </tr>
                <tr>
                    <td>Street Address</td><td><input type="text" name="address"></td>
                </tr>
                <tr>
                    <td>City</td><td><input type="text" name="city"></td>
                </tr>
                <tr>
                    <td>State</td><td><input type="text" name="state"></td>
                </tr>
                <tr>
                    <td>Start Date</td><td><input type="date" name="sDate"></td>
                </tr>
                <tr>
                    <td>Finish Date</td><td><input type="date" name="fDate"></td>
                </tr>
                <tr>
                    <td>Position</td><td><input type="text" name="position"></td>
                </tr>
                <tr>
                    <td>Email</td><td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <td>Phone</td><td><input type="text" name="phone"></td>
                </tr>
                
                <tr>
                    <td></td>
                    <td><input type="submit" value="Add Employer" ><input type="reset" value="clear"></td>
                </tr>
            </table>
            
        </form>
        <div><h3></h3></div>
        <form action='' method='POST' name='frmResults'>
            <?php
                //require_once 'dbConfig.php';
                try
                    {
                        $conn = new PDO("mysql: host=$hostname;dbname=$database;charset=utf8",$username,$password, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                        //echo "<h3>$username successfully connected to $database database on $hostname server</h3>";

                        $conn->exec("USE " . $database . ";");        

                        //setup the prepared sql statement
                        $psqlResults = $conn->prepare("SELECT * FROM Employment;");
                        $psqlResults->execute();
                        $results = $psqlResults->fetchAll(PDO::FETCH_ASSOC);
                        
                        //display the results data in an html tag
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
            <div>
                <input type='button' onClick='editRecord()' value='Update'>
                <input type='button' onClick='deleteRecord()' value='Delete'>
            </div>
        </form>
    </body>
</html>
