<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    include("Brain/check_if_loggedin.php");
    $type=$_POST["searchtype"];
    $value=$_POST["searchvalue"];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <body>
        <nav class="navbar navbar-default" role="navigation">
        <a class="navbar-index" href="index.php">Home</a>
        <?php if(!$loggedin): ?>
         <a href="login.php">Sign in</a>
         <a href="registration.php">Register</a>
        <?php else: ?>
          Logged in as <?php echo $loggedinas;?> 
          <a href="Brain/logout.php">Logout</a>
        <?php endif; ?>
        </nav>
        <form align="center" action="searchresults.php" method="POST">
            <select name="searchtype" >
                <option value="city" id="city" <?php echo ($type == "city" ? "SELECTED" : ""); ?>>City</option>
                <option value="zip"id="zip" <?php echo ($type == "zip" ? "SELECTED" : ""); ?>>Zip</option>
            </select>
            <input type="search" name="searchvalue" value="<?php echo $value;?>">
            <input type="submit" value="Search">
        </form>
        <h2> Search Results </h2>
        <?php
        $type=$_POST["searchtype"];
        $value=$_POST["searchvalue"];
        require 'Brain/dbconfig.php';
        $con=mysqli_connect("sfsuswe.com","f14g03","fzR-5NY-5oM-W2y","student_f14g03");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $query="SELECT * FROM houses WHERE $type='$value'";
        $result=$con->query($query);
        #echo $query;
        echo "<table style='width:100%' border='1'>
        <tr>
        <th>Address</th>
        <th>City</th>
        <th>Zip</th>
        <th>Price</th>
        <th>Bedrooms</th>
        <th>Bathrooms</th>
        <th>Description</th>
        <th>Date Added</th>
        <th>Image</th>
        </tr>";
        while($row = mysqli_fetch_array($result)) {
          $houseval=$row['id'];
          echo "<tr>";
          echo "<td>" . $row['address'] . "</td>";
          echo "<td>" . $row['city'] . "</td>";
          echo "<td>" . $row['zip'] . "</td>";
          echo "<td>" . $row['price'] . "</td>";
          echo "<td>" . $row['rooms'] . "</td>";
          echo "<td>" . $row['bathrooms'] . "</td>";
          echo "<td>" . $row['description'] . "</td>";
          echo "<td>" . $row['when_added'] . "</td>";
          $imgquery="SELECT path FROM images WHERE houseid='$houseval'";
          $imgresult=$con->query($imgquery);
          while($imgrow = mysqli_fetch_array($imgresult)) {
          echo "<td> <a href=" . $imgrow['path'] . ">Image</a></td>";}
          echo "</tr>";
        }

        echo "</table>";
        if (!mysqli_query($con,$query)) {
            die('Error: ' . mysqli_error($con));
        }
        ?>
    </body>
</html>
