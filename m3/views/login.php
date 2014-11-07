<!DOCTYPE html>

<?php
include 'navbar.php';

?>
<html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post" action="index.php" name="loginform">
            <label for="login_username">Username</label>
            <input id="login_username" type="text" name="login_username" placeholder="Username" required />
            <label for="login_password">Password</label>
            <input id="login_password" type="password" name="login_password" placeholder="Password"required />
            <input type="submit"  name="login" value="Log in" />
        </form>
        <a href="registration.php">Register new account</a>
    </body>
</html>
