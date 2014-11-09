<?php

include("navbar.php");
require '../models/listing_model.php';
require '../controllers/listings_controller.php';

?>
<div style="text-align:center" >
        <h3>Adding new listing:</h3>
        <form action="add_listings.php" method="post">
            <table style="text-align:center; margin: 0px auto">
            <tr><td>Address:</td><td><input type="text" name="address" placeholder="Address" /></td>
            <tr><td>City:</td><td><input type="text" name="city" placeholder="City" /></td>
            <tr><td>Zip:</td><td><input type="text" name="zip" placeholder="Zip" /></td>
            <tr><td>Price:</td><td><input type="number" name="price" placeholder="Price" min="0"/></td>
            <tr><td>Rooms #:</td><td><input type="number" name="rooms" placeholder="Rooms" min="0"/></td>
            <tr><td>Bathrooms #:</td><td><input type="number" name="bathrooms" placeholder="Bathrooms" min="0"/></td>
            <tr><td>Description:</td><td><textarea type="textfield" name="description"></textarea></td>
            </table>
            <input type="submit" value="Add listing" />
        </form>
</div>
