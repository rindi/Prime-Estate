<!DOCTYPE html>

<?php
include 'navbar.php';
echo $value = $_GET['listing'];
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
    <body>
        <form style="text-align:center; margin: 0px auto" action="searchresults.php" method="POST">
       
        <input type="submit" class="btn btn-inverse" value="<?php echo $value;?>">
        </form>
        <h2> Search Results </h2>
        
        <?php
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
            echo "<td><a href='" . $mapurl . "'><img src='assets/logo/maplink.png' height='42' width='42' ></img></a></td><td>";
//            echo "<a href = 'https://google.com'> Click Here </a></td><td>";
//            echo "<a href = '>" . $mapurl . " target='_blank'><img src='static/map-creation.png'></img></a></td><td>";
            #IMAGES!??!
            $images = $listingData->getImages();
            foreach((array)$images as $image) 
            {
                echo "<a href = " . $image . "><img src=" . $image . " height='42' width='42' ></img></a>";   
            }
            echo "</td></tr>";
        }
        
        echo "</tbody></table></div>";
        ?>
    </body>
</html>
