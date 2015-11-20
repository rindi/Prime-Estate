<?php
if( isset($_COOKIE['username']) )
{
    $loggedin = true;
    $loggedinas = $_COOKIE['username'];
}
else
{
    $loggedin = false;
}