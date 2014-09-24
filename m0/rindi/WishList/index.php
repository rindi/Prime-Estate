<?php
require_once("Includes/db.php");
$logonSuccess = false;

// verify user's credentials
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $logonSuccess = (WishDB::getInstance()->verify_wisher_credentials($_POST['user'], $_POST['userpassword']));
    if ($logonSuccess == true) {
        session_start();
        $_SESSION['user'] = $_POST['user'];
        header('Location: editWishList.php');
        exit;
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>What's on your wishlist?</title>
    </head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    <body>
        <h1 align="center">What's on your wishlist?</h1> 
        <form name="logon" action="index.php" method="POST" >
            <p>Sign in to edit your Wishlist!</p>
            Username: <input type="text" name="user"/>
            Password  <input type="password" name="userpassword"/>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (!$logonSuccess)
                    echo "Invalid name and/or password";
            }
            ?>
            <input type="submit" value="Edit My Wish List"/>
        </form>
        <form name="wishList" action="wishlist.php" method="GET">
            Show wish list of: <input type="text" name="user"/>
            <input type="submit" value="Go" />
        </form>
        Don't have a wish list? <a href="createNewWisher.php">Create one now!</a>
        
    </body>
</html>
