<?php

/*
@(#)File:           Logout
@(#)Purpose:        Controls User Logging out
@(#)Author:         PrimeEstate
@(#)Product:        PrimeEstate Website 2014
*/

session_unset(); 
session_destroy();
header('Location: http://sfsuswe.com/~f14g03/index.php');
?>
