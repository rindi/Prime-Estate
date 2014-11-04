<?php
require_once ("../controllers/controller.php");
require_once ("../models/user_model.php");

/**
 * User Controller Class
 */
class customer_controller extends controller
{
    /**
     * Constructor
     */
    public function __construct( ) 
    {
        parent::__construct();
    }
    
    /**
     * get all users from the table
     * @return \user_model
     */
    public function getUsers()
    {   
        $sql = "SELECT * from usertable";
        foreach( parent::$this->db_connect->query($sql) as $row )
        {
            $dataSet[] = new user_model($row);
        }

        if (!empty($dataSet))
            return $dataSet;
        else
            return null;
    }
}
