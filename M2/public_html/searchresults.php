<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    include("Brain/check_if_loggedin.php");
    #$type=$_POST["searchtype"];
    $value=$_POST["searchvalue"];
?>
<html>
    <style>
        h2{
         padding-left:500px;   
        }
    </style>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <body><nav class="navbar navbar-default" role="navigation">
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
        <form style="text-align:center; margin: 0px auto" action="searchresults.php" method="POST">
            <input type="search" name="searchvalue" value="<?php echo $value;?>">
            <input type="submit" class="btn btn-inverse" value="Find home">
        </form>
        <h2> Search Results </h2>
        <?php
        #$type=$_POST["searchtype"];
        $value=$_POST["searchvalue"];
        require 'Brain/dbconfig.php';
        $con=mysqli_connect("sfsuswe.com","f14g03","fzR-5NY-5oM-W2y","student_f14g03");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        if(is_numeric(substr($value, 0, 1)))
            $type="zip";
        else
            $type = "city";
        $query="SELECT * FROM houses WHERE $type='$value'";
        $result=$con->query($query);
        #echo $query;
        echo "<div class='results'>
        <table class='table' style='width:90%' border='1' align='center'>
        <thead>
        <tr>
        <th>Address</th>
        <th>City</th>
        <th>Zip</th>
        <th>Price</th>
        <th>Bedrooms</th>
        <th>Bathrooms</th>
        <th>Description</th>
        <th>Date Added</th>
        <th>View on Map</th>
        <th>Image</th>
        </tr></thead>";
        while($row = mysqli_fetch_array($result)) {
          $houseval=$row['id'];
          $mapurl = $row['map'];
          echo "<tbody><tr>";
          echo "<td>" . $row['address'] . "</td>";
          echo "<td>" . $row['city'] . "</td>";
          echo "<td>" . $row['zip'] . "</td>";
          echo "<td>" . $row['price'] . "</td>";
          echo "<td>" . $row['rooms'] . "</td>";
          echo "<td>" . $row['bathrooms'] . "</td>";
          echo "<td>" . $row['description'] . "</td>";
          echo "<td>" . $row['when_added'] . "</td>";
          echo "<td><a href='" . $mapurl . "'><img src='static/map-creation.png' height='42' width='42' ></img></a></td><td>";
          #echo "<a href = 'https://google.com'> Click Here </a></td><td>";
          #echo "<a href = '>" . $row['map'] . " target='_blank'><img src='static/map-creation.png'></img></a></td><td>";
          $imgquery="SELECT path FROM images WHERE houseid='$houseval'";
          $imgresult=$con->query($imgquery);
          while($imgrow = mysqli_fetch_array($imgresult)) {
          echo "<a href = " . $imgrow['path'] . "><img src=" . $imgrow['path'] . " height='42' width='42' ></img></a>";}
          echo "</td></tr>";
        }

        echo "</tbody></table></div>";
        if (!mysqli_query($con,$query)) {
            die('Error: ' . mysqli_error($con));
        }
        ?>
    </body>
</html>
