<?php
require '../models/listing_model.php';
require '../controllers/listings_controller.php';
if (!isset($_SESSION)) {
    session_start();
}

//dynamically need user id!?!?!?!?
$interested = 1;
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
}
//expressing interest
require_once "../controllers/interest_controller.php";
if (isset($_GET['interest']) && isset($_GET['userid'])) {
    $interest = new interest_controller();
    $interest->expressInterest($userid, $_GET['id']);
} else if (isset($_GET['interest'])) {
    die("ADD FUNCTIONALITY TO CONTACT SELLER WITHOUT ID. EVERY SITE HAS IT.");
}

$listing_controller = new listings_controller();
$listing_model = $listing_controller->getListing($_GET['id']);
$images = $listing_controller->getImages($_GET['id']);
$image_1 = $images[0];

$addressgooglemaps = $listing_model->getAddress();
$citygooglemaps = $listing_model->getCity();
$zipgooglemaps = $listing_model->getZip();
$mapaddress = $addressgooglemaps . ', ' . $citygooglemaps . " " . $zipgooglemaps;
$enc = base64_decode('QUl6YVN5Q25DZHFkRDFiNm1yRDBpaUpZejRIZGZmMVhqXzlaRFkw') . '&q=';
$srcstart = 'src = "https://www.google.com/maps/embed/v1/place?key=';
$end = '"';
$mapstring = $srcstart . $enc . $mapaddress . $end;
?>
<?php include("navbar.php"); ?>

<script>
    $(document).ready(function () {
        $("#photos").click(function () {
            $("#mapitis").attr("class", "");
            $("#photositis").attr("class", "displaynone");
            $("#photos").attr("id", "seepht");

        });
        $("#seepht").click(function () {
            $("#mapitis").attr("class", "displaynone");
            $("#photositis").attr("class", "");
            $("#seepht").attr("id", "photos");
        });
    });
</script>

<html>
    <div class="container">
	<form>
	    <input class="btn btn-default" type="button" value="&laquo; Back" onClick="history.go(-1);
                    return true;">
	</form>
        <div id="listing" class="panel panel-default">
            <!-- contains 3 wells: 1) image/info 2) map 3) description etc. -->

            <div class="panel-body">


                <!-- 1ST WELL: CAROUSEL AND PRIMARY INFO -->
                <div class="well">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			    <div class="well">
				<?php include("houses_carousel.php"); ?>      
			    </div>                         
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			    <div class="">

				<div class="panel panel-default">

				    <table class="table">
					<tr>
					    <td>
						<h2>$ <?php echo $listing_model->getPrice(); ?></h2>
					    </td>
					</tr>
					<tr>
					    <td>
						<h3><?php echo $listing_model->getAddress(); ?></h3>
					    </td>
					    <td></td>
					</tr>
					<tr>
					    <td>
						<?php echo $listing_model->getCity(); ?>, <?php echo $listing_model->getZip(); ?>
					    </td>
					    <td></td>
					</tr>
					<tr>
					    <td>
						Bathrooms: <?php echo $listing_model->getBathrooms(); ?>
					    </td>
					    <td>
						Rooms: <?php echo $listing_model->getRooms(); ?>
					    </td>
					</tr>
				    </table>
				    <div class="panel-footer">
					<div class="clearfix">
					    <?php if (isset($_SESSION['userid'])): ?>
    					    <a href="listing_page.php?interest=<?php echo $interested; ?>&id=<?php echo $_GET['id']; ?>&userid=<?php echo $userid; ?>"
    					       class="btn btn-success pull-right" 
    					       value="Edit listing" type="button">Contact seller
    					    </a>
    					</div>
					<?php else: ?>
    					<div class="clearfix">
    					    <a href="newlogin.php" class="btn btn-primary pull-right">Login to contact</a>
    					</div>   
					<?php endif ?>
				    </div>
				</div>

			    </div>
			</div>
		    </div>
		</div>

		<!-- 2ND WELL: MAP -->
		<div class="well">
		    <div class="row">
			<div class="col-xs-12">
			    <iframe
				width='100%'
				height='250'
				frameborder='0' style='border:0'
				<?php echo $mapstring; ?>>
			    </iframe>
			</div>
		    </div>
		</div>



		<div class="panel panel-default">
		    <div class="panel-body">
			<h2>Description</h2>
			<p><?php echo $listing_model->getDescription(); ?></p>
		    </div>
		    <div class="panel-footer">
			<strong>Date posted: </strong><?php echo $listing_model->getDateAdded(); ?>
		    </div>
		</div>
	    </div>
	</div>
    </div>
</html>