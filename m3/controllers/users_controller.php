<?php
require_once ("../controllers/controller.php");
require_once ("../controllers/realtor_controller.php");
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
//            return $row;
            $user = new user_model($row);
            return $user;
        }
    }
    
    /**
     * Add a user to the database
     * @param type $input
     */
    public function addUser($input)
    {
        $sql = "INSERT INTO 
                usertable (username, password, type, email, firstname, lastname) 
                VALUES (:username, :password, :type, :email, :firstname, :lastname)";
        
        $stmt = $this->db_connect->prepare($sql);
        $stmt->bindParam(':username', $input[0]->setUserName(), PDO::PARAM_STR);       
        $stmt->bindParam(':password', $input[1]->setUserPassword(), PDO::PARAM_STR); 
        $stmt->bindParam(':type', $input[2]->setUserType(), PDO::PARAM_STR); 
        $stmt->bindParam(':email', $input[3]->setUserEmail(), PDO::PARAM_STR);   
        $stmt->bindParam(':firstname', $input[4]->setFirstName(), PDO::PARAM_STR); 
        $stmt->bindParam(':lastname', $input[5]->setLastName(), PDO::PARAM_STR); 
        
        $stmt->execute();  
        echo "User added, check DB";
        //if the new user is a customer set them up with a dummy profile
        if ($input->getUserType() == 1)
        {
            $username = $input->getUserName();
            $sql = "SELECT * FROM usertable WHERE username = '$username'";
            foreach(parent::$this->db_connect->query($sql) as $row )
            {
                $custController = new profile_controller();
                $custController->newProfile($row['userid']);
            }
        }
    }
}
