<?php

include("navbar.php");

/* check if user is seller aka. allowed to edit listing */
if( !isset($_COOKIE['seller'] ) )
{
    die("Cookie 'seller' is NOT set.");
}else
{
    echo "Cookie 'seller' IS not set.";
}