<?php
require ("../controllers/controller.php");
require ("../models/user_model.php");
class UsersController extends Controller
{
    public function __construct( ) 
    {
        parent::__construct();
        /* test if connected to db */
        // if( parent::$this->db_connect ) echo "this is finally working";
    }
    
    public function getUsers()
    {   
        $sql = "SELECT * from usertable";
        foreach( parent::$this->db_connect->query($sql) as $row )
            $dataSet[] = new user_model($row);
        if( !empty($dataSet) )
            return $dataSet;
        else
            return null;
    }
}
