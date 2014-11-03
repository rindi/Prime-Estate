<!DOCTYPE html>

<?php
//  this is the code from brain/check if logged in;
    if( isset($_COOKIE['username']) )
    {
        $loggedin = true;
        $loggedinas = $_COOKIE['username'];
    }
    else
    {
        $loggedin = false;
    }
    $value = $_POST["searchvalue"];
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
        $value=$_POST["searchvalue"];
        require '../models/listing_model.php';
        require '../controllers/listings_controller.php';
     
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
        
        $list_controller = new listings_controller();
        $listingSet = $list_controller->searchListings($value);
        foreach((array)$listingSet as $listingData) 
        {
            $houseval=$listingData->getId();
            $mapurl = $listingData->getMap();;
            echo "<tbody><tr>";
            echo "<td>" . $listingData->getAddress() . "</td>";
            echo "<td>" . $listingData->getCity() . "</td>";
            echo "<td>" . $listingData->getZip() . "</td>";
            echo "<td>" . $listingData->getPrice() . "</td>";
            echo "<td>" . $listingData->getRooms() . "</td>";
            echo "<td>" . $listingData->getBathrooms() . "</td>";
            echo "<td>" . $listingData->getDescription() . "</td>";
            echo "<td>" . $listingData->getDateAdded() . "</td>";
            echo "<td><a href='" . $mapurl . "'><img src='static/map-creation.png' height='42' width='42' ></img></a></td><td>";
            #echo "<a href = 'https://google.com'> Click Here </a></td><td>";
            #echo "<a href = '>" . $row['map'] . " target='_blank'><img src='static/map-creation.png'></img></a></td><td>";
            #IMAGES!??!
            $images = $listingData->getImages();
            foreach((array)$images as $image) 
            {
                echo "<a href = " . $image . "><img src=" . $image . " height='42' width='42' ></img></a>";
                
            }
            echo "</td></tr>";
            
//            $imgquery="SELECT path FROM images WHERE houseid='$houseval'";
//            $imgresult=$con->query($imgquery);
//            
//            while($imgrow = mysqli_fetch_array($imgresult)) {
//            echo "<a href = " . $imgrow['path'] . "><img src=" . $imgrow['path'] . " height='42' width='42' ></img></a>";}
//            echo "</td></tr>";
        }
        
        echo "</tbody></table></div>";
//        if (!mysqli_query($con,$query)) {
//            die('Error: ' . mysqli_error($con));
//        }
        ?>
    </body>
</html>
