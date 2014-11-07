<!DOCTYPE html>

<?php
include 'navbar.php';
//$value=$_POST["searchvalue"];

//  this is the code from brain/check if logged in;
//    if( isset($_COOKIE['username']) )
//    {
//        $loggedin = true;
//        $loggedinas = $_COOKIE['username'];
//    }
//    else
//    {
//        $loggedin = false;
//    }
//    $value = $_POST["searchvalue"];
?>

<html>
    <style>
        h2{
         padding-left:500px;   
        }
    </style>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <body>
        <h2> Leads </h2>
        
        <?php
//        $value=$_POST["searchvalue"];
        require '../models/lead_model.php';
        require '../controllers/leads_controller.php';
     
        #echo $query;
        echo "<div class='results'>
        <table class='table' style='width:90%' border='1' align='center'>
        <thead>
        <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>E-mail</th>
        <th>Phone</th>
        <th>Date of Lead</th>
        </tr></thead>";
        
        $lead_controller = new leads_controller();
        $leadSet = $lead_controller->getLeads();
        foreach((array)$leadSet as $leadData) 
        {
            echo "<tbody><tr>";
            echo "<td>" . $leadData->getFirstname() . "</td>";
            echo "<td>" . $leadData->getLastname() . "</td>";
            echo "<td>" . $leadData->getEmail() . "</td>";
            echo "<td>" . $leadData->getPhone() . "</td>";
            echo "<td>" . $leadData->getContactDate() . "</td>";
            
//            $imgquery="SELECT path FROM images WHERE houseid='$houseval'";
//            $imgresult=$con->query($imgquery);
//            
//            while($imgrow = mysqli_fetch_array($imgresult)) {
//            echo "<a href = " . $imgrow['path'] . "><img src=" . $imgrow['path'] . " height='42' width='42' ></img></a>";}
//            echo "</td></tr>";
        }
        
        echo "</tbody></table></div>";
//        if (!mysqli_query($con,$query)) {
//            die('Error: ' . mysqli_error($con));
//        }
        ?>
    </body>
</html>
