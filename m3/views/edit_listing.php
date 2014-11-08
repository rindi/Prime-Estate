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
            <h2 class="panel-title"><?php echo $listing_model->getAddress(); ?></h2>
            <a href="http://stackoverflow.com" class="btn btn-default" value="Edit Listing" type="button" onclick="return confirm('Are you sure you wnat to delete this listing?');">Delete Listing</a>
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
                    <?php echo $listing_model->getZip(); ?>
                    <form>
                        <input id="address" value="<?php echo $listing_model->getAddress();?>" type="text" disabled>
                        <input id="city" value="<?php echo $listing_model->getCity();?>" type="text" disabled>
                        <input id="zip" value="<?php echo $listing_model->getZip();?>" type="text" disabled>
                        <input id="price" value="<?php echo $listing_model->getPrice();?>" type="text" disabled>
                        <input id="rooms" value="<?php echo $listing_model->getRooms();?>" type="text" disabled>
                        <input id="bathrooms" value="<?php echo $listing_model->getBathrooms();?>" type="text" disabled>
                        <input id="description" value="<?php echo $listing_model->getDescription();?>" type="text" disabled>
                        <input id="edit" class="btn btn-default" type="button" value="Edit Listing">
                        
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
var el  = document.getElementById('edit');
var address = document.getElementById('address');
var city = document.getElementById('city');
var zip = document.getElementById('zip');
var price = document.getElementById('price');
var rooms = document.getElementById('rooms');
var bathrooms = document.getElementById('bathrooms');
var description = document.getElementById('description');
var count = 0;

//building url
var listingnumeber = "<?php Print($_GET['id']); ?>";
var postfix = "?id=";
var postfix = postfix.concat(listingnumeber);
var prefix = "http://sfsuswe.com/~f14g03/views/edit_listing.php";
var nextPage = prefix.concat(postfix);

el.addEventListener('click', function()
{
    if (count == 0)
    {
        address.disabled = false;
        city.disabled = false;
        zip.disabled = false;
        price.disabled = false;
        rooms.disabled = false;
        bathrooms.disabled = false;
        description.disabled = false;
        address.focus(); // set the focus on the editable field
        el.value = "Save Changes";
        count++;
    }
    else
    {
        window.location = nextPage;
    }
});
</script>