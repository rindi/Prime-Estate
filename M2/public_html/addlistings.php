<?php

?>
<!DOCTYPE html>
<html>
<head>

</head>

<body>
    <nav>
        <a href="index.php">Home</a>
        <a href="login.php">Sign in</a>
        <a href="registration.php">Register</a>
    </nav>
    
    <div style="text-align:center; border: 1px solid #000;" >
        <h3 style="border-bottom: 1px solid #000;">Adding new listings:</h3>
        <form action="addlistings_process.php" method="post">
            Address:<input type="text" name="address" placeholder="address" /><br>
            City:<input type="text" name="city" placeholder="city" /><br>
            Zip:<input type="text" name="zip" placeholder="zip" /><br>
            Price:<input type="number" name="price" placeholder="price" /><br>
            Rooms #:<input type="number" name="rooms" placeholder="rooms" /><br>
            Bathrooms #:<input type="number" name="bathrooms" placeholder="bathrooms" /><br>
            Description:<br><textarea type="textfield" name="description" style="max-height: 200px;max-width: 300px;"></textarea><br>
            <input type="submit" value="Add listing" />
        </form>
    </div>
    
    <footer>
        <a href="data_usage.php">Data usage</a>
    </footer>
</body>
</html>