<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsersController extends Controller
{
    
    public function __construct() {
        super();
        if( $db_connect ) echo "CONNECTED TO DB JUST FINE.";
    }
}