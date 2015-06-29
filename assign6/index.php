<?php
    $username = "N00816280";
    $password = "cop816280";
    $hostname = "http://cop4813.ccec.unf.edu/";
    $database = "N00816280";
    $conn = mysql_connect($hostname,$username,$password);
    mysql_select_db($database,$conn) or die("Unable to select database");
    
    
    
    
    
    mysql_close();
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
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
