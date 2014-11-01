<?php
require ("../controllers/controller.php");
class UsersController extends Controller
{
    public function __construct( ) {
        parent::__construct();
        
        if( parent::$this->db_connect )
        {
            echo "<br>CONNECTED TO DB JUST FINE. second";
        }
    }
}