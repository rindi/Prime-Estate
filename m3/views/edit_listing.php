<?php

include("navbar.php");
require '../models/listing_model.php';
require '../controllers/listings_controller.php';

/* check if user is seller aka. allowed to edit listing */
if( !isset($_COOKIE['seller'] ) )
{
    die("Cookie 'seller' is NOT set.");
}

$listing_controller = new listings_controller();
$listing_model = $listing_controller->getListing($_GET['id']);
$images = $listing_controller->getImages($_GET['id']);
$image_1 = $images[0];

//$listing_model = new listing_model($current_listing);
?>

<div class="container">
    <div id="listing" class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">Edit house #<?php echo $listing_model->getId(); ?></h2>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4">
                    <div class="row">
                        <div class="col-xs-12">
                            <a href="<?php echo $images[0];?>" class="thumbnail">
                                <img src="<?php echo $images[0];?>" alt="..."><br>
                                <a href="edit_photo.php" class="btn btn-default">Edit photos</a>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-8">
                    <!-- WHY FOLLOWING LINE WONT WORK ? -->
                    <?php echo "this thing does not work!! WHY ???".$listing_model->getZip(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
