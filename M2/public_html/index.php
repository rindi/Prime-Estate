<?php

include("Brain/check_if_loggedin.php");

?>
<html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <body>
        <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
        <a class="navbar-brand" href="index.php">Prime Estate</a>
        <ul class="nav navbar-nav">

        <?php if(!$loggedin): ?>
         <li class="active">
             <a href="login.php">Sign in</a>
         </li>
         <li class="active">
             <a href="registration.php">Register</a>
         </li>
        <?php else:?>
            <li class="active">
                <a href="profile.php">Signed in as <?php echo $loggedinas;?></a>
            </li>
         <li class="active">
             <a href="Brain/logout.php">Logout</a>
         </li>
         <?php endif; ?>
    
        </div>
        </nav>
        
        <br/><br/><br/><br/>
        
        <h1 align="center">
            Welcome to Prime Estate<?php if($loggedin) echo ", ".$loggedinas; ?>.
        </h1>
        
        <br/><br/>
        
        <h4 align="center"> Get started - Search by City or Zip</h4><br/>
        
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