<!DOCTYPE html>

<?php
include 'navbar.php';

if (isset($_GET['search'])) {
    $value = $_GET['search'];
} else {
    $value = $_POST["searchvalue"];
}

if (isset($_SESSION["type"]))
    $usertype = $_SESSION["type"];
else
    $usertype = 0;
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Prime Estate - Search Results</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Search Results
                    <small> for <?php echo $value;?></small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!--Results-->
        
        <?php
        require '../models/listing_model.php';
        require '../controllers/listings_controller.php';
        $list_controller = new listings_controller();
        $listingSet = $list_controller->searchListings($value);
        if (count($listingSet) > 0) {
            $offset = 5;
            $start = 0;
            $page = 1;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                $start = $offset * ($page - 1);
            }
            
            echo "<div class=\"container\"><div class=\"alert alert-success\">";
            $end = $start + $offset;
            if ($end > count($listingSet)) {
                $end = count($listingSet);
            }
            echo count($listingSet);
            if (count($listingSet) == 1)
                echo " result! Showing page ";
            else
                echo " results! Now Showing page ";
            echo $page;
            echo " of ";
            $max = ceil(count($listingSet) / $offset);
            echo $max;
            echo " TOTAL RESULTS: ";
            echo count($listingSet);
            echo "</div></div>";
            
            for ($i = $start; $i < $end; $i++)
            {
        ?>
        
        <div class="row">
            <div class="col-md-5">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/500x300" alt="">
                </a>
            </div>
            <div class="col-md-7">
                <h3><?php echo $listingData->getAddress();?></h3>
                <h4><?php echo $listingData->getCity(). ' ' .$listingData->getZip();?></h4>
                <h4>Bedrooms : <?php echo $listingData->getRooms();?> Bathrooms : <?php echo $listingData->getBathrooms();?></h4>
                <a class="btn btn-primary" href="#">View House <span class="glyphicon glyphicon-chevron-right"></span></a>
                <a class="btn btn-primary" href="#">Contact Seller<span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->
        <?php
            }
            echo "<div class=\"container\">";
            echo "<nav style=\"text-align: center\"><ul class=\"pagination\">";
            if ($page > 1 && $page < $max) {
                $page = $page + 1;
                $last = $page - 2;
                echo "<li><a href='http://sfsuswe.com/~f14g03/views/searchresults.php?search=" . $value . "&page=" . $last . "'>Previous 5 Records</a></li>";
                echo "<li><a href='http://sfsuswe.com/~f14g03/views/searchresults.php?search=" . $value . "&page=" . $page . "'>Next 5 Records</a></li>";
            } else if ($page == 1) {
                $page = $page + 1;
                //           echo "<a href=\"$_PHP_SELF?page=$page\">Next 10 Records</a>";
                if ($max != 1)
                    echo "<li><a href='http://sfsuswe.com/~f14g03/views/searchresults.php?search=" . $value . "&page=" . $page . "'>Next 5 Records</a></li>";
            }
            else {
                $last = $page - 1;
                echo "<li><a href='http://sfsuswe.com/~f14g03/views/searchresults.php?search=" . $value . "&page=" . $last . "'>Previous 5 Records</a></li>";
            }
            echo "</ul></nav>";
            echo "</div>";
            // PAGINATION END
        } 
        
        else {
            echo "There were no results for your search.  Please check your search and try again!";
        }
        ?>
    <hr>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

</body>

</html>