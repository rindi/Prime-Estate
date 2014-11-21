<?php
require '../controllers/listings_controller.php';

$images_controller = new listings_controller();
$all_images = $images_controller->getImages($_GET['id']);

if ($_GET['removepath']) {
    $images_controller->removeImage($_GET['removepath']);
    $all_images = $images_controller->getImages($_GET['id']);
}
?>
<?php include("navbar.php"); ?>

<div class="container">
    <div class="row">
        <a href="http://sfsuswe.com/~f14g03/views/edit_listing.php?id=<?php echo $_GET['id']; ?>">
            <button class="btn btn-default" value="&laquo; Back">Back to Listing</button>
        </a>
        <a href="http://sfsuswe.com/~f14g03/views/upload.php?id=<?php echo $_GET['id']; ?>">
            <button class="btn btn-default" value="&laquo; Back">Add a Photo</button>
        </a>
        <?php for ($i = 0; $i < count($all_images); $i++): ?>
            <div class="col-xs-6 col-md-3">
                <a class="thumbnail">
                    <img src="<?php echo $all_images[$i]; ?>" alt="...">
                </a>

                <a href="edit_photo.php?id=<?php echo $_GET['id']; ?>&removepath=<?php echo $all_images[$i]; ?>">
                    <button class="btn btn-danger" value="Remove">Remove</button>
                </a>
            </div>
        <?php endfor; ?>
    </div>
</div>
