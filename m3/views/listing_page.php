<?php

require '../models/listing_model.php';
require '../controllers/listings_controller.php';


$listing_controller = new listings_controller();
$listing_model = $listing_controller->getListing($_GET['id']);
$images = $listing_controller->getImages($_GET['id']);
$image_1 = $images[0];

?>
<?php include("navbar.php");?>
<div class="container">
    <div id="listing" class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title"><?php echo $listing_model->getAddress(); ?> [last modified: <?php echo $listing_model->getDateModified(); ?>]</h2>
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
                    <?php echo $listing_model->getCity(); ?> 
                    <?php echo $listing_model->getPrice(); ?>
                    <?php echo $listing_model->getRooms(); ?> 
                    <?php echo $listing_model->getBathrooms(); ?>
                    <?php echo $listing_model->getDescription(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!--<!DOCTYPE html>
<html>
<head>
<script>
function initialize()
{
  var mapProp = {
    center: new google.maps.LatLng(37.7118078,-122.4545622),
    zoom:11,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
  var marker=new google.maps.Marker({
  position:myCenter,
  icon:'/assets/logo/PrimeEstate_Logo_Search.png'
  });

marker.setMap(map);
}

function loadScript()
{
  var script = document.createElement("script");
  script.type = "text/javascript";
  script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false&callback=initialize";
  document.body.appendChild(script);
}

window.onload = loadScript;
</script>
</head>

<body>
<div id="googleMap" style="width:500px;height:500px;"></div>

</body>
</html>-->


<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Google Maps JavaScript API v3 Example: Geocoding Simple</title>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
  var geocoder;
  var map;
  var address ="San Diego, CA";
  function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(-34.397, 150.644);
    var myOptions = {
      zoom: 8,
      center: latlng,
    mapTypeControl: true,
    mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
    navigationControl: true,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    if (geocoder) {
      geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
          map.setCenter(results[0].geometry.location);

            var infowindow = new google.maps.InfoWindow(
                { content: '<b>'+address+'</b>',
                  size: new google.maps.Size(150,50)
                });

            var marker = new google.maps.Marker({
                position: results[0].geometry.location,
                map: map, 
                title:address
            }); 
            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(map,marker);
            });

          } else {
            alert("No results found");
          }
        } else {
          alert("Geocode was not successful for the following reason: " + status);
        }
      });
    }
  }
</script>
</head>
<body style="margin:0px; padding:0px;" onload="initialize()">
 <div id="map_canvas" style="width:100%; height:100%">
</body>
</html>
<!--http://stackoverflow.com/questions/15925980/using-address-instead-of-longitude-and-latitude-with-google-maps-api-->