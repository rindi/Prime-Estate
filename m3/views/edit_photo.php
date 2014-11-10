<?php

include("../controllers/listinhgs_controller.php");

$images_controller = new listings_controller();
$all_images = $images_controller->getImages($_GET['id']);

?>