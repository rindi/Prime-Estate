<?php
include("navbar.php");
require '../models/listing_model.php';
require '../controllers/listings_controller.php';
session_start();
echo $_SESSION['userid'];
if(isset($_POST['SubmitButton'])) 
{
   
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


//header('Location: http://sfsuswe.com/~f14g03/views/upload.php');
}

?>
<div style="text-align:center" >
    <?php echo $_SESSION['userid'];?>
        <h3>Adding new listing:</h3>
        <h3>Step 1.</h3>
        <form action="" method="post">
        <!--<form action="add_listings.php" method="post">-->
            <table style="text-align:center; margin: 0px auto">
            <tr><td>Address*:</td><td><input type="text" name="address" placeholder="Address" required/></td>
            <tr><td>City*:</td><td><input type="text" name="city" placeholder="City" required/></td>
            <tr><td>Zip*:</td><td><input type="text" name="zip" placeholder="Zip" required/></td>
            <tr><td>Price:</td><td><input type="number" name="price" placeholder="Price" min="0"/></td>
            <tr><td>Rooms #:</td><td><input type="number" name="rooms" placeholder="Rooms" min="0"/></td>
            <tr><td>Bathrooms #:</td><td><input type="number" name="bathrooms" placeholder="Bathrooms" min="0"/></td>
            <tr><td>Description:</td><td><textarea type="textfield" name="description"></textarea></td>
            </table>
            <input type="submit" value="Add listing" name="SubmitButton"/>
        </form>
</div>
