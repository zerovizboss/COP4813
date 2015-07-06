<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <div>
            <h1>Login Session</h1>
        </div>
        <div id="main">
            <form action="login.php" method="post">
                <table>
                    <tr>
                        <td>Username: </td><td><input type="text" name="username" placeholder="username"></td>
                    </tr>
                    <tr>
                        <td>Password: </td><td><input type="password" name="password" placeholder="**********"></td>
                    </tr>
                    <tr>
                        <td></td><td><input type="submit" name="signin" value="sign in"><input type="reset" name="clear"></td>
                    </tr>
                </table>
                <span><?php $error = $_GET['error'];
                        if($error == 1){echo 'invalid credentials';}
                        elseif($error==2){echo 'you must login first';}
                        elseif($error==3){echo 'Update Unsuccessful, review your code';}
                        ?></span>
            </form>       
        </div>
    </body>
</html>