<?php
require_once "../controllers/interest_controller.php";
if(isset($_GET['interest']))
{
    $interest = new interest_controller();
    $interest->expressInterest(551,55);
}

?>
