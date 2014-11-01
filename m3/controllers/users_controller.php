<?php
require ("../controllers/controller.php");
class UsersController extends Controller
{
    
    public function __construct() {
        parent::__construct();
        if( $db_connect ) echo "CONNECTED TO DB JUST FINE.";
    }
}