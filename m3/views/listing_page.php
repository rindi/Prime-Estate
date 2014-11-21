<?php
require '../models/listing_model.php';
require_once '../models/user_model.php';
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
$user_controller = new users_controller();
$realtorid = $listing_model->getUserId();
$realtor = $user_controller->getUserInfo($realtorid);
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
    
function alertafterContact() {
 alert("Thank you for contacting us! We will get in touch with you soon");
}
</script>

<html>
    <head>
        <title>
            PrimeEstate - View Property <?php echo $listing_model->getAddress();?>
        </title>
    </head><body style="padding-bottom: 40px">
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
						    <h2><?php echo '$' . number_format($listing_model->getPrice(), 0, '.', ',');?></h2>
						</td>
					    </tr>
					    <tr>
						<td>
						    <h3><?php echo $listing_model->getAddress(); ?>
							<small><?php echo $listing_model->getCity(); ?>, CA  
							    <?php echo $listing_model->getZip(); ?></small>
						    </h3>
						    <h4>
							Rooms: <?php echo $listing_model->getRooms(); ?> &nbsp;&nbsp;&nbsp;
							Bathrooms: <?php echo $listing_model->getBathrooms(); ?>
						    </h4>
						</td>
					    </tr>
					    <tr>
						<td>
<!--						    <img class="img-circle pull-left" 
							 src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" 
							 style="width: 140px; height: 140px;">						    <div style='margin-left: 150px;'>-->

							<h2><?php echo $realtor['firstname']. ' '.$realtor['lastname']?></h2>
							<p>PrimeEstate Inc.</p>
							<form>
							    <div class='form-group'>
								<input class='form-control' type='textfield' placeholder='Name'>
							    </div>
							    <div class='form-group'>
								<input class='form-control' type='email' placeholder='Email'>
							    </div>
							    <div class='form-group'>
								<textarea class='form-control' style='resize:none'>I am interested in <?php echo $listing_model->getAddress(); ?>. Please contact me.</textarea>
							    </div>
							</form>
						    </div>
						</td>
					    </tr>
					</table>

					<div class="panel-footer">
					    <div class="clearfix">
						<?php if (isset($_SESSION['userid'])): ?>
    						<a href="listing_page.php?interest=<?php echo $interested; ?>&id=<?php echo $_GET['id']; ?>&userid=<?php echo $userid; ?>"
    						   class="btn btn-default pull-right" 
    						   value="Contact Seller" type="button" onclick="alertafterContact();">Contact seller
    						</a>
                                                
    					    </div>
					    <?php else: ?>
    					    <div class="clearfix">
    						<a href="newlogin.php" class="btn btn-default pull-right">Contact</a>
    					    </div>   
					    <?php endif ?>
					</div>
				    </div>

				</div>
			    </div>
			</div>
		    </div>

		    <!-- 2ND WELL: MAP -->
		    <div class="row">
			<div class="col-xs-12 col-sm-6">
			    <div class="well">
				<iframe
				    width='100%'
				    height='250'
				    frameborder='0' style='border:0'
				    <?php echo $mapstring; ?>>
				</iframe>
			    </div>
			</div>

			<div class="col-xs-12 col-sm-6">
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
	    </div>
	</div>
    </body>
</html>