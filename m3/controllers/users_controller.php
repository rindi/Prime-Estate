<?php
require_once ("../controllers/controller.php");
require_once ("../controllers/interest_controller.php");
require_once ("../controllers/profile_controller.php");
require_once ("../models/user_model.php");

if( isset($_COOKIE['username']) )
{
    $loggedin = true;
    $loggedinas = $_COOKIE['username'];
}
else
{
    $loggedin = false;
}
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
                usertable (username, password, type, email, firstname, lastname) 
                VALUES (:username, :password, :type, :email, :firstname, :lastname)";
        
        $stmt = $this->db_connect->prepare($sql);
        $stmt->bindParam(':username', $input->getUserName(), PDO::PARAM_STR);       
        $stmt->bindParam(':password', $input->getUserPassword(), PDO::PARAM_STR); 
        $stmt->bindParam(':type', $input->getUserType(), PDO::PARAM_STR); 
        $stmt->bindParam(':email', $input->getUserEmail(), PDO::PARAM_STR);   
        $stmt->bindParam(':firstname', $input->getFirstname(), PDO::PARAM_STR); 
        $stmt->bindParam(':lastname', $input->getLastname(), PDO::PARAM_STR);   
        
        $stmt->execute();
        echo 'User Registered.';

        $username = $input->getUserName();
        $sql = "SELECT * FROM usertable WHERE username = '$username'";
//        $rows = parent::$this->db_connect->query($sql);
//        var_dump($rows[0]);
        foreach(parent::$this->db_connect->query($sql) as $row )
        {
//            var_dump($row);
            $custController = new profile_controller();
            $custController->newProfile($row['userid']);
        }
    }
    
    
    /**
     * get all users from the table
     * @return \user_model
     */
    public function getRealtors()
    {   
        $sql = "SELECT * from usertable WHERE type = '2'";
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
     * get all users from the table
     * @return \user_model
     */
    public function getCustomers()
    {   
        $sql = "SELECT * from usertable WHERE type = '1'";
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
     * get all users from the table
     * @return \user_model
     */
    public function delete($userid)
    {   
        $sql = "DELETE FROM usertable WHERE userid = :userid";
        $stmt = $this->db_connect->prepare($sql); 
        $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);   
        $stmt->execute();
    }
}
