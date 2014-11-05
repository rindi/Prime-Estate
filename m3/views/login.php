<!DOCTYPE html>

<?php
include 'navbar.php';
?>
<html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form style="text-align:center; margin: 0px auto" action="Brain/login.php" method="POST">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="submit"> 
        </form>
    <footer>
        <div class="footer navbar-fixed-bottom">
        <a href="data_usage.php">Data usage</a>
    </footer>
    </body>
</html>
