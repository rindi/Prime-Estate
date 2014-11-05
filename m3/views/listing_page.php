<?php

include("navbar.php");
$listing_controller = new listings_controller();
$current_listing = $list_controller->getLisint($_GET['id']);
?>

<h1>Show house #<?php echo $current_listing; ?></h1>

<div id="listing">
    
</div>