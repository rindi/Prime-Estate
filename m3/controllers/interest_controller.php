<?php
require_once ("../controllers/controller.php");
require_once ("../controllers/users_controller.php");
require_once ("../models/user_model.php");

/**
 * User Controller Class
 */
class interest_controller extends controller
{
    /**
     * Constructor
     */
    public $dataSet=0;
    public function __construct( ) 
    {
        parent::__construct();
    }
    
    /**
     * get all users from the table
     * @return \user_model
     */
    public function getInterestedCustomers($listing)
    {   
        $sql = "SELECT * FROM interestedcustomers WHERE id = '$listing'";
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
    /**
     * get all users from the table
     * @return \user_model
     */
    public function expressInterest($uid,$listing)
    {   
        $sql = "INSERT INTO interestedcustomers(userid, id, date) VALUES (
            :userid, :id, :date)";
                                       
        $stmt = $this->db_connect->prepare($sql);
        $stmt->bindParam(':userid', $uid, PDO::PARAM_INT);       
        $stmt->bindParam(':id', $listing, PDO::PARAM_INT); 
        $stmt->bindParam(':date', date("Y/m/d"), PDO::PARAM_STR);  
        
        $stmt->execute();  
    }
}
