<?php
include 'navbar.php';

if (isset($_GET['search'])) {
    $value = $_GET['search'];
} else {
    $value = $_POST["searchvalue"];
}

if (isset($_SESSION["type"]))
{
    $usertype = $_SESSION["type"];
}
else
    $usertype = 0;

require '../models/listing_model.php';
require '../controllers/listings_controller.php';
$list_controller = new listings_controller();
$listingSet = $list_controller->searchListings($value);

if (count($listingSet) > 0) {
            //Pagination
            $offset = 5;
            $start = 0;
            $page = 1;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                $start = $offset * ($page - 1);
            }
            
            $end = $start + $offset;
            if ($end > count($listingSet)) {
                $end = count($listingSet);
            }
            echo count($listingSet);
            if (count($listingSet) == 1)
                echo " result! Showing page ";
            else
                echo " results! Now Showing page ";
            echo $page;
            echo " of ";
            $max = ceil(count($listingSet) / $offset);
            echo $max;
            echo " TOTAL RESULTS: ";
            echo count($listingSet);
            
for ($i = $start; $i < $end; $i++) {
            //foreach((array)$listingSet as $listingData) 
                $listingData = $listingSet[$i];
                $houseval = $listingData->getId();
//                echo "<td><a href=\"listing_page.php?id=" . $houseval . "\">" . $houseval . "</a>";
//                if ($usertype == 2)
//                    echo "<a href=\"edit_listing.php?id=" . $houseval . "\"> Edit</a>";
//                echo "</td>";
                //            echo "<td><a href='" . $mapurl . "'><img src='assets/logo/maplink.png' height='42' width='42' ></img></a></td><td>";
                $images = $listingData->getImages();
                foreach ((array) $images as $image) {
                //echo "<a href = " . $image . "><img src=" . $image . " height='42' width='42' ></img></a>";
}}}
?>
<html>
    <head>
        <style>
            .well {
                margin-top:-20px;
                background-color:#00A19A;
                border:2px solid #00A19A;
                text-align:center;
                cursor:pointer;
                font-size: 25px;
                padding: 15px;
                border-radius: 0px !important;
            }

            .well:hover {
                margin-top:-20px;
                background-color:#95C11F;
                border:2px solid #7FD0CC;
                text-align:center;
                cursor:pointer;
                font-size: 25px;
                padding: 15px;
                border-radius: 0px !important;
                border-bottom : 2px solid rgba(97, 203, 255, 0.65);
            }

            body {
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            font-size: 14px;
            line-height: 1.42857143;
            color: #fff;
            }
            
            .right {
                float: right;
                width: 300px;
            }
            .bg_blur
            {
                //background-image:url('http://data2.whicdn.com/images/139218968/large.jpg');
                //height: 300px;
                background-size: cover;
            }

            .header{
                color : #808080;
                margin-left:5%;
                margin-top:0px;
            }

            .picture{
                height:150px;
                width:150px;
                position:absolute;
                top: 75px;
                left: 35px;
            }

            .picture_mob{
                position: absolute;
                width: 35%;
                left: 35%;
                bottom: 70%;
            }

            .btn-style{
                color: #fff;
                background-color: #007FBE;
                border-color: #adadad;
                width: 33.3%;
            }

            .btn-style:hover {
                color: #333;
                background-color: #3D5DE0;
                border-color: #adadad;
                width: 33.3%;
            }

            @media (max-width: 767px) {
                .header{
                    text-align : center;
                }

                .nav{
                    margin-top : 30px;
                }
            }
        </style>
    </head>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<body>
    <h2> Search Results </h2>
<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
    <div class="row panel">
        <div class="col-md-4 bg_blur "></div>
        <div class="col-md-8  col-xs-12">
           <div class="header">
                <h1><?php echo $listingData->getAddress();?></h1>
                <h4><?php echo $listingData->getCity();?></h4>
                <h4><?php echo $listingData->getZip();?></h4>
                <h4><?php echo $listingData->getPrice();?></h4>
                <h4><?php echo $listingData->getRooms();?></h4>
                <h4><?php echo $listingData->getBathrooms();?></h4>
                <h4><?php echo $listingData->getDateAdded();?></h4>

                <span>
                </span>
            </div>
        </div>         
    </div>
        <div class="row panel">
            <div class="col-md-4 col-xs-4 well center">
                <a href="listing_page.php?id="<?php $houseval ?>>View</a>
            </div>            
        </div>
        <div class="row panel">
            <div class="col-md-4 col-xs-4 well center">Contact</div>
        </div>
</div>
</body>
</html>