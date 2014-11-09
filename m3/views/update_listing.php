<?php

include("../models/listing_model.php");
include("../controllers/listings_controller.php");

$a = $_GET['address'];
$b = $_GET['city'];
$c = $_GET['zip'];
$d = $_GET['price'];
$e = $_GET['rooms'];
$f = $_GET['bathrooms'];
$g = $_GET['description'];

echo "".$a.$b.$c.$d.$e.$f.$g;


?>