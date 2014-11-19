<!DOCTYPE html>

<?php
include 'navbar.php';

if (isset($_GET['search'])) {
    $value = $_GET['search'];
} else {
    $value = $_POST["searchvalue"];
    $_GET['search'] = $_POST["searchvalue"];
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
	<style>
	    #search-field{
		height: 35px;
		border: 2px solid #12cac5;
	    }
	    #submit-form{
		padding: 0px;
	    }
	</style>
    </head>

    <body>
	<!-- Page Content -->
	<div class="container">

	    <!-- Page Heading -->
	    <div class="panel panel-default">
		<div class="well-sm">
		    <div id="searchbox" class="mainbox" style="padding-top:16px;">
			<form class="form-horizontal" style="text-align:center; margin: 0px auto" action="search_results.php" method="POST">
			    <div class="form-group">
				<div class="col-xs-offset-3 col-xs-5">
				    <input style="height:39px;" id="search-field" type="search" name="searchvalue" placeholder="Enter a City or Zipcode" class="form-control" value="<?php echo $value; ?>">
				</div>
				<label for="submit-form" class="btn btn-default col-xs-1"><i class="glyphicon glyphicon-search"></i></label>
				<input id="submit-form" type="submit" class="btn btn-inverse col-xs-1 hidden">
			    </div>
			</form>
		    </div>
		</div>
	    </div>
	    <!-- /.row -->

	    <!--Results-->
	    <div id="heading" class="mainbox">
                <h1>Search Results for </h1>
            </div>
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

		echo "<div style=\"text-align:center;\" class=\"\"><div class=\"alert alert-success\">";
		$end = $start + $offset;
		if ($end > count($listingSet)) {
		    $end = count($listingSet);
		}
		echo "<div class=\"row\"><div class=\"col-xs-2\"><strong>";
		echo count($listingSet);
		if (count($listingSet) == 1)
		    echo " RESULT</div> <div class=\"col-xs-10\">PAGE ";
		else
		    echo " RESULTS</div> <div class=\"col-xs-10\">PAGE ";
		echo $page;
		echo "-";
		$max = ceil(count($listingSet) / $offset);
		echo $max."</strong></div>";
		//echo "<div >TOTAL RESULTS: ";
		//echo count($listingSet);
		//echo "</div></div></div>";
		echo "</div></div></div>";

		for ($i = $start; $i < $end; $i++) {
		    $listingData = $listingSet[$i];
		    $houseval = $listingData->getId();
		    ?>
		    <div class="">
			<div class="panel panel-default" style="padding: 10px;">
			    <div class="well" style="margin-bottom:0px">
			    <div class="row">
				<div class="col-md-5">
				    <?php
				    $images = $listingData->getImages();
				    if ($images)
					echo '<a href="listing_page.php?id=' . $houseval . '">';
				    else
					echo '<a href="#">';
				    echo '<img class="img-responsive" src=';
				    if ($images)
					echo "'" . $images[0] . "' height='500' width='300' ";
				    else
					echo "http://placehold.it/500x300";

				    echo "</img></a>";
				    ?>
				</div>
				<div class="col-md-7">
				    <div class="h3">
					<style>
					    .alignleft {
						float: left;
					    }
					    .alignright {
						float: right;
					    }
					</style>
					<h3 class="alignleft"><?php echo $listingData->getAddress(); ?></h3>
					<h3 class="alignright"><?php echo '$' . number_format($listingData->getPrice(), 0, '.', ',');?></h3>
				    </div>
				    <br><br><br>
				    <h4><?php echo $listingData->getCity() . ' ' . $listingData->getZip(); ?></h4>
				    <h4>Bedrooms : <?php echo $listingData->getRooms(); ?> Bathrooms : <?php echo $listingData->getBathrooms(); ?></h4>
				    <a class="btn btn-default" href="listing_page.php?id=<?php echo $houseval; ?>"><strong>View House </strong> <span class="glyphicon glyphicon-chevron-right"></span></a>
				    <a class="btn btn-default" href="#"><strong>Contact Seller </strong><span class="glyphicon glyphicon-chevron-right"></span></a>
				    <?php if($usertype == 2): ?>
				    <a class="btn btn-default" href="edit_listing.php?id=<?php echo $listingData->getId();?>"><strong>Edit </strong><span class="glyphicon glyphicon-chevron-right"></span></a>
				    <?php endif;?>
				</div>
			    </div>
			</div>
			</div>
		    </div>
		    <hr>
		    <!-- /.row -->
		    <?php
		}
		echo "<div class=\"container\">";
		echo "<nav style=\"text-align: center\"><ul class=\"pagination pagination-lg\">";
		if ($page > 1 && $page < $max) {
		    $page = $page + 1;
		    $last = $page - 2;
		    echo "<li><a href='http://sfsuswe.com/~f14g03/views/search_results.php?search=" . $value . "&page=" . $last . "'>Previous</a></li>";
		    echo "<li><a href='http://sfsuswe.com/~f14g03/views/search_results.php?search=" . $value . "&page=" . $page . "'>Next</a></li>";
		} else if ($page == 1) {
		    $page = $page + 1;
		    //           echo "<a href=\"$_PHP_SELF?page=$page\">Next 10 Records</a>";
		    if ($max != 1)
			echo "<li><a href='http://sfsuswe.com/~f14g03/views/search_results.php?search=" . $value . "&page=" . $page . "'>Next</a></li>";
		}
		else {
		    $last = $page - 1;
		    echo "<li><a href='http://sfsuswe.com/~f14g03/views/search_results.php?search=" . $value . "&page=" . $last . "'>Previous</a></li>";
		}
		echo "</ul></nav>";
		echo "</div>";
		// PAGINATION END
	    } else {
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
