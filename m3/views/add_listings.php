<?php

include("navbar.php");
require '../models/listing_model.php';
require '../controllers/listings_controller.php';
session_start();

$input['address'] = $_POST['address'];
$input['city'] = $_POST['city'];
$input['zip'] = $_POST['zip'];
$input['price'] = $_POST['price'];
$input['rooms'] = $_POST['rooms'];
$input['bathrooms'] = $_POST['bathrooms'];
$input['description'] = $_POST['description'];
$input['userid'] = $_SESSION['userid'];
$house = new listing_model($input);

$listing_controller = new listings_controller();
$listing_controller->addListing($house);

echo $input['address'] . ' added';

header('Location: http://sfsuswe.com/~f14g03/index.php');
//header('Location: http://sfsuswe.com/~f14g03/views/listing_page.php?id=' . $house->getId());

?>
