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
            <div class="row">
                <div class="col-xs-2 col-sm-3 col-md-3 col-lg-4">
                    <div class="row">
                        <div class="col-xs-6 col-md-3">
                            <a href="#" class="thumbnail">
                                <img data-src="" alt="...">
                            </a>
                        </div>
                        
                    </div>
                </div>
                <div class="col-xs-10 col-sm-9 col-md-9 col-lg-8">
                    content 2
                </div>
            </div>
        </div>
    </div>
</div>
