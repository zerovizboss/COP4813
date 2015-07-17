
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>AJAX Intro</title>
        <link href="http://cop4813.ccec.unf.edu/~N00816280/cop4813/ePortfolio.css" rel="Stylesheet" type="text/css" media="screen">
        
    </head>
    <body>
        <script language="javascript" type="text/javascript">
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
                        }//end final catch{}
                }//end 2nd catch{}
            }//end first catch{}

            //function to retrieve data from the server
            ajaxRequest.onreadystatechange = function()
                {
                    if (ajaxRequest.readyState === 4)
                    {
                        document.getElementById("output").innerHTML = ajaxRequest.responseText;
                    }
                };
            var selection = document.frmResults.listEmployers.value;

            ajaxRequest.open("GET", "http://cop4813.ccec.unf.edu/~N00816280/cop4813/assign7/getUpdate.php?selection=" + selection, true);
            ajaxRequest.send(null);
        }
        </script>
        <form name='frmResults'>
            <select name="listEmployers" onChange="ajax()">
            <?php
                require_once 'dbConfig.php';
            
                try
                    {
                        $conn = new PDO("mysql: host=$hostname;dbname=$database;charset=utf8",$username,$password, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                        //echo "<h3>$username successfully connected to $database database on $hostname server</h3>";

                        $conn->exec("USE " . $database . ";");        

                        //setup the prepared sql statement
                        $psqlResults = $conn->prepare("SELECT * FROM Employment;");
                        $psqlResults->execute();
                        $results = $psqlResults->fetchAll(PDO::FETCH_ASSOC);
                        echo "<option>Make a Selection</option>";
                        foreach($results as $row)
                        {
                            echo "<option value='" . $row['id'] . "'>" . $row['Employer'] . "</option>";
                        }
                        
                    }
                    catch(PDOException $pe)
                    {
                        die($username . "Failed to login on database $database, verify your username and password are correct" . $pe->getMessage());
                    }
            ?>
            </select>
        </form>
        <br>
        <p id="output"></p>
    </body>
</html>
