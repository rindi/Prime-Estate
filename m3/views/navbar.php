<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['type'])) {
    $type = $_SESSION['type'];
    $username = $_SESSION['username'];
} else
    $type = 0;
?>
<html>
    <link rel="shortcut icon" href="http://sfsuswe.com/~f14g03/views/assets/logo/favicon.ico" type="image/x-icon">
    <link rel="icon" href="http://sfsuswe.com/~f14g03/views/assets/logo/favicon.ico" type="image/x-icon">
    <head>
    </head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://sfsuswe.com/~f14g03/views/css/bootstrap.css" />
    <link rel="stylesheet" href="css/main.css" />
    <style>
        .navbar{
            margin-bottom: 0px;
        }
        .footer {
            background-color: #FFFFFF;
            text-align: center;
        }
        .navbar{
            background: rgba(255,255,255, 0.9);
            border-radius: 0px;
            border: 0px;
            border-bottom: 2px solid #12cac5;
        }
    </style>
    <body>
        <nav class="navbar" role="navigation" style="margin-bottom:0px;">
            <div class="navbar-header" >
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>    
            </div>
            <a class="navbar-brand" href="http://sfsuswe.com/~f14g03/index.php">
                <img style="max-width:100px; margin-top: -7px;margin-right: 90px;" src="http://sfsuswe.com/~f14g03/views/assets/logo/PrimeEstate_Logo_Menu.png">
            </a>
            <div id="navbar-collapse" class="navbar-collapse collapse">
                <strong>
                    <ul class="nav navbar-nav navbar-left"> 
<?php
if ($type == 1) {
    ?>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown">My Profile<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="http://sfsuswe.com/~f14g03/views/profile.php">Profile</a></li>
                                    <li><a href="http://sfsuswe.com/~f14g03/views/changepassword.php">Change password</a></li>
                                    <!--                                    <li class="divider"></li>
                                                                        <li><a href="#">Separated link</a></li>-->
                                </ul>
                            </li>
                            <li><a href="http://sfsuswe.com/~f14g03/views/buyers_guide.php">Buyer's Guide</a>
                            </li>

    <?php
}
if ($type == 0 || $type == 1) {
    ?>
                            <li> 
                                <a href="http://sfsuswe.com/~f14g03/index.php">Buy Your New Home</a>
                            </li>
                            <li> 
                                <a href="http://sfsuswe.com/~f14g03/views/sell.php">Sell Your Home Today!</a>
                            </li>
                            <li> 
                                <a href="http://sfsuswe.com/~f14g03/views/contactus.php">Contact Us</a>
                            </li><?php
}
if ($type == 2) {
    ?>
                            <li>
                                <a href="http://sfsuswe.com/~f14g03/views/leads.php">Leads</a>
                            </li><?php
}
if ($type == 2) {
    ?>
                            <li>
                                <a href="http://sfsuswe.com/~f14g03/views/search_results.php?rid=1">Dashboard</a>
                            </li><?php
                    }
                    if ($type == 2) {
                        ?>
                            <li>
                                <a href="http://sfsuswe.com/~f14g03/views/add_listing.php">Add Listing</a>
                            </li><?php
                    }
                    if ($type == 3) {
                        ?>
                            <li>
                                <a href="http://sfsuswe.com/~f14g03/views/admin.php">Admin</a>
                            </li><?php }
?>
                    </ul>
                    <ul     class="nav navbar-nav navbar-right">
                        <?php
                        if ($type == 1 || $type == 2 || $type == 3) {
                            ?>
                            <li> 
                                <a href="http://sfsuswe.com/~f14g03/views/logout.php">Logout</a>
                            </li><?php } ?>
<?php
if ($type == 0) {
    ?>
                            <li>
                                <a href="http://sfsuswe.com/~f14g03/views/registration.php">Sign Up</a>
                            </li>

    <?php
}
if ($type == 0) {
    ?>
                            <li>
                                <a href="http://sfsuswe.com/~f14g03/views/newlogin.php">Login</a>
                            </li>
<?php } ?></ul>
                </strong>
            </div>
        </nav>

        <footer>
            <div class="footer navbar-fixed-bottom">
                <a href="http://sfsuswe.com/~f14g03/views/policy.php">San Francisco State University Software Engineering Project, Fall 2014.  For Demonstration Purposes Only</a>
            </div>
        </footer>
    </body>
</html>
