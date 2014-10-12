<?php

include("Brain/check_if_loggedin.php");

?>
<html>
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
        <input type="search" name="search">
        <input type="submit" value="Search">

    </form>
    <footer>
        <a href="data_usage.php">Data usage</a>
    </footer>
</body>
</html>