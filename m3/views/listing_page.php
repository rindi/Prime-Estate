<?php

require '../models/listing_model.php';
require '../controllers/listings_controller.php';


$listing_controller = new listings_controller();
$current_listing = $listing_controller->getListing($_GET['id']);
$images = $listing_controller->getImages($_GET['id']);
$image_1 = $images[0];

$listing_model = new listing_model($current_listing);

?>
<?php include("navbar.php");?>
<div class="container">
    <div id="listing" class="panel panel-default">
        <div class="panel-heading">
          <h2 class="panel-title">Show house #<?php echo $current_listing['id']; ?></h2>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4">
                    <div class="row">
                        <div class="col-xs-12">
                            <a href="<?php echo $images[0];?>" class="thumbnail">
                                <img src="<?php echo $images[0];?>" alt="...">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-8">
                    <!-- WHY FOLLOWING LINE WONT WORK ? -->
                    <?php echo $listing_model->getAddress(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
