<?php
require '../controllers/listings_controller.php';

$images_controller = new listings_controller();
$all_images = $images_controller->getImages($_GET['id']);

if( $_GET['removeid'] )
{
    echo "remove house with id ".$_GET['removeid'];
}
?>
<?php include("navbar.php"); ?>

<div class="container">
    <div class="row">
        <?php for ($i = 0; $i < count($all_images); $i++): ?>
            <div class="col-xs-6 col-md-3">
                <a class="thumbnail">
                    <img src="<?php echo $all_images[$i]; ?>" alt="...">
                </a>
                <a href="edit_photo.php?id=<?php echo $_GET['id'];?>&removeid=">
                    <button class="btn btn-danger" value="Remove">Remove</button>
                </a>
            </div>
        <?php endfor; ?>
    </div>
</div>
