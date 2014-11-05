<?php

require '../models/listing_model.php';
require '../controllers/listings_controller.php';

include("navbar.php");
$listing_controller = new listings_controller();
$current_listing = $listing_controller->getListing($_GET['id']);
?>

<div class="container">
    <div id="listing" class="panel panel-default">
        <div class="panel-heading">
          <h2 class="panel-title">Show house #<?php echo $current_listing['id']; ?></h2>
        </div>
        <div class="panel-body">
          Basic panel example
        </div>
    </div>
</div>
