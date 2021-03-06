<?php
include("Brain/check_if_loggedin.php");
?>
<!DOCTYPE html>
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
             <a href="addlistings.php">Add Listings</a>
         </li>
         <li class="active">
             <a href="Brain/logout.php">Logout</a>
         </li>
         <?php endif; ?>
    
        </div>
        </nav>
        <style>
            input{
                padding:5px;
                margin:5px;
            }
        </style>
    <div style="text-align:center" >
        <h3>Adding new listing:</h3>
        <form action="addlistings_process.php" method="post">
            <table style="text-align:center; margin: 0px auto">
            <tr><td>Address:</td><td><input type="text" name="address" placeholder="Address" /></td>
            <tr><td>City:</td><td><input type="text" name="city" placeholder="City" /></td>
            <tr><td>Zip:</td><td><input type="text" name="zip" placeholder="Zip" /></td>
            <tr><td>Price:</td><td><input type="number" name="price" placeholder="Price" min="0"/></td>
            <tr><td>Rooms #:</td><td><input type="number" name="rooms" placeholder="Rooms" min="0"/></td>
            <tr><td>Bathrooms #:</td><td><input type="number" name="bathrooms" placeholder="Bathrooms" min="0"/></td>
            <tr><td>Description:</td><td><textarea type="textfield" name="description"></textarea></td>
            </table>
            <input type="submit" value="Add listing" />
        </form>
    </div>
    
     <footer>
        <div class="footer navbar-fixed-bottom">
        <a href="data_usage.php">Data usage</a>
     </footer>
</body>
</html>