<?php
require_once ("../controllers/controller.php");
require_once ("../controllers/customer_controller.php");
require_once ("../models/user_model.php");

/**
 * User Controller Class
 */
class users_controller extends controller
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
    
    /**
     * get a user's info from the table
     * @return \user_model
     */
    public function getUserInfo($userid)
    {   
        $sql = "SELECT * FROM usertable WHERE userid = '$userid'";
        foreach(parent::$this->db_connect->query($sql) as $row )
        {
            return $row;
        }
    }
    
    /**
     * Add a user to the table
     * @param type $input
     */
    public function addUser($input)
    {
        $sql = "INSERT INTO 
                usertable (username, password, type, email) 
                VALUES (:username, :password, :type, :email)";
        
        $stmt = $this->db_connect->prepare($sql);
        $stmt->bindParam(':username', $input->getUserName(), PDO::PARAM_STR);       
        $stmt->bindParam(':password', $input->getUserPassword(), PDO::PARAM_STR); 
        $stmt->bindParam(':type', $input->getUserType(), PDO::PARAM_STR); 
        $stmt->bindParam(':email', $input->getUserEmail(), PDO::PARAM_STR);   
        
        $stmt->execute();  
        //$custController = new customer_controller();
        //$custController->newProfile();
    }
}
