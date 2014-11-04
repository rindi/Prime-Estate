<?php
require_once ("../controllers/controller.php");
require_once ("../controllers/users_controller.php");
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
    public function getCustomers($listing)
    {   
        $sql = "SELECT * FROM customers WHERE id = '$listing'";
        foreach($this->db_connect->query($sql) as $row)
        {
            $user_controller = new users_controller();
            $temp = $user_controller->getUserInfo($row['userid']);
            $tempuser = new user_model($temp);
            $tempuser->setContactDate($row['date']);
            $dataSet[] = $tempuser;
        }
        return $dataSet;
    }
}
