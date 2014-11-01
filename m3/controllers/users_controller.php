<?php
require ("../controllers/controller.php");
class UsersController extends Controller
{
    public function __construct( ) 
    {
        parent::__construct();
        
        /* test if connected to db */
        // if( parent::$this->db_connect ) echo "this is finally working";
    }
}
