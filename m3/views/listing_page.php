<?php

require '../models/listing_model.php';
require '../controllers/listings_controller.php';

include("navbar.php");
$listing_controller = new listings_controller();
$current_listing = $listing_controller->getListing($_GET['id']);
?>

<h1>Show house #<?php echo $current_listing['id']; ?></h1>

<div id="listing">
    
</div>