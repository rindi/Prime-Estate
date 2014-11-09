<!DOCTYPE html>

<?php
include 'navbar.php';

if(isset($_GET['search']))
{
    $value = $_GET['search'];
}
else
{
    $value = $_POST["searchvalue"];
}


//  this is the code from brain/check if logged in;
//    if( isset($_COOKIE['username']) )
//    {
//        $loggedin = true;
//        $loggedinas = $_COOKIE['username'];
//    }
//    else
//    {
//        $loggedin = false;
//    }
//    $value = $_POST["searchvalue"];
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
        <input type="search" name="searchvalue" value="<?php echo $value;?>">
        <input type="submit" class="btn btn-inverse" value="Find home">
        </form>
        <h2> Search Results </h2>
        
        <?php
        
        require '../models/listing_model.php';
        require '../controllers/listings_controller.php';
        $list_controller = new listings_controller();       
        $listingSet = $list_controller->searchListings($value);
        if (count($listingSet)>0)
        {
            #echo $query;
            echo "<div class='results'>
            <table class='table' style='width:90%' border='1' align='center'>
            <thead>
            <tr>
            <th>House #</th>
            <th>Address</th>
            <th>City</th>
            <th>Zip</th>
            <th>Price</th>
            <th>Bedrooms</th>
            <th>Bathrooms</th>
            <th>Description</th>
            <th>Date Added</th>
            <th>View on Map</th>
            <th>Images</th>
            </tr></thead>";

            //pagination

            $offset = 5;
            if( isset($_GET['page'] ) )
            {
                $page = $_GET['page'];
                $start = $offset*($page-1);
            }
            else
            {
                $start = 0;
                $page = 1;
            }

            $end = $start + $offset;
            if ($end>count($listingSet))
            {
                $end = count($listingSet);
            }
            echo count($listingSet);
            echo " results!  Now Showing page ";
            echo $page;
            echo " of ";
            $max = round(count($listingSet)/$offset, 0, PHP_ROUND_HALF_DOWN);
            echo $max;
            echo " TOTAL RESULTS: ";
            echo count($listingSet);


            for ($i = $start; $i<$end; $i++)
            //foreach((array)$listingSet as $listingData) 
            {
                $listingData = $listingSet[$i];
                $houseval=$listingData->getId();
                $mapurl = $listingData->getMap();;
                echo "<tbody><tr>";
                echo "<td><a href=\"listing_page.php?id=".$houseval."\">" . $houseval . "</a>";
                echo "<a href=\"edit_listing.php?id=".$houseval."\"> Edit</a>";
                echo "</td>";
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

            if( $page > 1 && $page < $max )
            {
               $page = $page + 1;
               $last = $page - 2;
               echo "<a href='http://sfsuswe.com/~f14g03/views/searchresults.php?search=".$value."&page=".$last."'>Last 10 Records</a>";
               echo "<a href='http://sfsuswe.com/~f14g03/views/searchresults.php?search=".$value."&page=".$page."'>Next 10 Records</a>";
            }
            else if( $page == 1 )
            {
               $page = $page + 1;
    //           echo "<a href=\"$_PHP_SELF?page=$page\">Next 10 Records</a>";
               echo "<a href='http://sfsuswe.com/~f14g03/views/searchresults.php?search=".$value."&page=".$page."'>Next 10 Records</a>";
            }
            else 
            {
               $last = $page - 1;
               echo "<a href='http://sfsuswe.com/~f14g03/views/searchresults.php?search=".$value."&page=".$last."'>Last 10 Records</a>";
            }
        }
        else {echo "There were no results for your search.  Please check your search and try again!";}
        ?>
        
        <?php if( isset($_COOKIE['seller'])): ?>
        <a>Edit house #41</a> &nbsp;
        
        <?php endif; ?>
    </body>
</html>
