<?php

include("Brain/check_if_loggedin.php");

?>
<html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <body>
    <nav>
        <a href="index.php">Home</a>
        <?php if(!$loggedin): ?>
            <a href="login.php">Sign in</a>
         <a href="registration.php">Register</a>
        <?php else: ?>
             Logged in as <?php echo $loggedinas;?> <a href="Brain/logout.php">Logout</a>
        <?php endif; ?>
    </nav>
    <p>
        Welcome to Prime Estate<?php if($loggedin) echo ", ".$loggedinas; ?>.
    </p>
    <form align="center" action="searchresults.php" method="POST">
        <select name="searchtype">
            <option value="city" id="city" selected>City</option>
            <option value="zip" id="zip" >Zip</option>
        </select>   
        <input type="search" name="searchvalue">
        <input type="submit" value="Search">
    </form>
    <footer>
        <div class="footer navbar-fixed-bottom">
        <a href="data_usage.php">Data usage</a>
    </footer>
</body>
</html>