<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
        <a class="navbar-brand" href="index.php">Prime Estate</a>
        <ul class="nav navbar-nav">
        <li class="active">
             <a href="login.php">Sign in</a>
         </li>
         <li class="active">
             <a href="registration.php">Register</a>
         </li>    
        </div>
        </nav>
        <form align=center action="Brain/login.php" method="POST">
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
