<?php
require_once ("../controllers/controller.php");
require_once ("../controllers/users_controller.php");
require_once ("../models/user_model.php");

/**
 * User Controller Class
 */
class profile_controller extends controller
{
    /**
     * Constructor
     */
    public function __construct( ) 
    {
        parent::__construct();
    }
    
    /**
     * get profile for a customer by their id
     * @return \user_model
     */
    public function getProfile($customerid)
    {   
//        $temp  = $customerid->getUserid();
//        echo $temp;
//        $sql = "SELECT * FROM customerprofile WHERE userid = '$temp'";
//        foreach($this->db_connect->query($sql) as $row)
//        {
//            $user_controller = new users_controller();
//            $temp = $user_controller->getUserInfo($row['userid']);
//            $tempuser = new user_model($temp);
//            $tempuser->setContactDate($row['date']);
//            $dataSet[] = $tempuser;
//        }
//        return $dataSet;
    }
    
    
    /**
     * called when a new user is created
     */
    public function newProfile($customerid)
    {   
        $sql = "INSERT INTO customerprofile(userid, personalinformation) VALUES (
            :userid, :profile)";
                          
        $default_profile = "Enter more information about yourself and what kind of home you are interested in!";
        
        $stmt = $this->db_connect->prepare($sql);
        $stmt->bindParam(':userid', $customerid, PDO::PARAM_INT);       
        $stmt->bindParam(':profile', $default_profile, PDO::PARAM_STR);  

        $stmt->execute(); 
//        echo "done";
    }
    
    /**
     * Edit a Listing in the Database
     * @param type $input
     */
    public function updateCustomerProfile($input)
    {
        $sql = "UPDATE customerprofile SET zip = :zip, 
            bedrooms = :bedrooms, 
            bathrooms = :bathrooms, 
            pricemin = :pricemin, 
            pricemax = :picemax, 
            personalinformation = :personalinformation, 
            WHERE useid = :userid";
                                          
        $stmt = $this->db_connect->prepare($sql);
        $stmt->bindParam(':zip', $input->getAddress(), PDO::PARAM_STR);       
        $stmt->bindParam(':bedrooms', $input->getCity(), PDO::PARAM_STR); 
        $stmt->bindParam(':bathrooms', $input->getZip(), PDO::PARAM_INT);  
        $stmt->bindParam(':pricemin', $input->getPrice(), PDO::PARAM_INT); 
        $stmt->bindParam(':pricemax', $input->getRooms(), PDO::PARAM_INT);   
        $stmt->bindParam(':personalinformation', $input->getBathrooms(), PDO::PARAM_INT); 
        $stmt->bindParam(':userid', $input->getId(), PDO::PARAM_INT);   

        $stmt->execute();       
    }
}
