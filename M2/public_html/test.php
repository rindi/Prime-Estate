<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$addr = '125 Cambon Drive';
$city = 'San Francisco';
$addrns = preg_replace('/\s+/', '+', $addr);
echo $addrns;
$cityns = preg_replace('/\s+/', '+', $city);
$map = 'https://maps.googleapis.com/maps/api/staticmap?center=/'.addrns.','.cityns.'&zoom=14&size=400x400&markers=color:blue7Clabel:S%7C11206'.addrns.','.cityns;
echo $map;
?>