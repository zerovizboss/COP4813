<?php
    session_start();
    session_destroy();
    header('location: index.php');
    exit();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Log Out</title>
    </head>
    <body>
        <header>
            You have successfully signed out of your session.  Thank you and come again
        </header>
    </body>
</html>

