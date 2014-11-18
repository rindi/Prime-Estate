<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if(isset($_SESSION['type']))
    $type = $_SESSION['type'];
else
    $type = 0;
?>
<html>
    <head>
    </head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://sfsuswe.com/~f14g03/views/css/bootstrap.css" />
    <style>
	.navbar{
	    margin-bottom: 0px;
	}
        .footer {
        background-color: #FFFFFF;
        text-align: center;
        }
    </style>
    <body>
        <nav class="navbar" role="navigation" style="margin-bottom:0px;">
            
            <div class="navbar-header" >
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>    
            </div>
            <a class="navbar-brand" href="http://sfsuswe.com/~f14g03/index.php">
                    <img style="max-width:100px; margin-top: -7px;" src="http://sfsuswe.com/~f14g03/views/assets/logo/PrimeEstate_Logo_Menu.png">
                </a>
            <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left"> 
            <?php
            if($type==0||$type==1)
            {?>
            <li> 
                <a href="http://sfsuswe.com/~f14g03/views/sell.php">Sell Your Home Today!</a>
             </li><?php
            }
            if($type==2)
            {?>
             <li>
                <a href="http://sfsuswe.com/~f14g03/views/leads.php">Leads</a>
            </li><?php
            }
            if($type==1)
            {?>
            <li>
                <a href="http://sfsuswe.com/~f14g03/views/profile.php">My Profile</a>
            </li><?php
            }
            if($type==2)
            {?>
            <li>
                <a href="http://sfsuswe.com/~f14g03/views/dashboard.php">Realtor Dashboard</a>
            </li><?php
            }
            if($type==2)
            {?>
            <li>
                <a href="http://sfsuswe.com/~f14g03/views/add_listing.php">Add Listing</a>
            </li><?php
            }
            if($type==3)
            {?>
            <li>
                <a href="http://sfsuswe.com/~f14g03/views/admin.php">Admin</a>
            </li><?php
            }?>
            </ul>
            <ul     class="nav navbar-nav navbar-right">
            <?php
            if($type==1||$type==2||$type==3)
            {?>
            <li> 
                <a href="http://sfsuswe.com/~f14g03/views/logout.php">Logout</a>
            </li><?php } ?>
            <?php 
            if($type==0)
            {?>
            <li>
                <a href="http://sfsuswe.com/~f14g03/views/registration.php">Sign Up</a>
            </li>
            
            <?php }
            if($type==0)
            {?>
                <li>
                <a href="http://sfsuswe.com/~f14g03/views/newlogin.php">Login</a>
            </li>
            <?php }?></ul>
            </div>
        </nav>
        <footer>
        <div class="footer navbar-fixed-bottom">
        <a href="http://sfsuswe.com/~f14g03/views/data_usage.php">San Francisco State University Software Engineering Project, Fall 2014.  For Demonstration Purposes Only</a>
        </div>
        </footer>
    </body>
</html>