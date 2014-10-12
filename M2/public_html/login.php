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
        <nav>
            <a href="index.php">Home</a>
            <a href="login.php">Sign in</a>
        </nav>
        <form align=center action="Brain/login.php" method="POST">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="submit"> 
        </form>
        <footer>
        <a href="data_usage.php">Data usage</a>
    </footer>
    </body>
</html>
