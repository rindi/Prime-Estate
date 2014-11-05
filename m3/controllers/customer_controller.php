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
     * get profile for a customer by their id
     * @return \user_model
     */
    public function getProfile($customerid)
    {   
        $temp  = $customerid->getUserid();
        echo $temp;
        $sql = "SELECT * FROM customerprofile WHERE userid = '$temp'";
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
        $sql = "INSERT INTO customerprofile(userid, profile) VALUES (
            :userid, :profile)";
                          
        $default_profile = "Enter more information about yourself and what kind of home you are interested in!";
        
        $stmt = $this->db_connect->prepare($sql);
        $stmt->bindParam(':userid', $customerid, PDO::PARAM_INT);       
        $stmt->bindParam(':profile', $default_profile, PDO::PARAM_STR);  
  
        $stmt->execute(); 
        echo "done";
    }
    
    /**
     * Edit a Listing in the Database
     * @param type $input
     */
    public function upsertCustomerProfile($input)
    {
        $sql = "UPDATE customerprofile SET address = :address, 
            city = :city, 
            zip = :zip, 
            price = :price, 
            rooms = :rooms, 
            bathrooms = :bathrooms, 
            description = :description,  
            when_modified = :when_modified
            WHERE id = :id";
                                          
        $stmt = $this->db_connect->prepare($sql);
        $stmt->bindParam(':address', $input->getAddress(), PDO::PARAM_STR);       
        $stmt->bindParam(':city', $input->getCity(), PDO::PARAM_STR); 
        $stmt->bindParam(':zip', $input->getZip(), PDO::PARAM_INT);  
        $stmt->bindParam(':price', $input->getPrice(), PDO::PARAM_INT); 
        $stmt->bindParam(':rooms', $input->getRooms(), PDO::PARAM_INT);   
        $stmt->bindParam(':bathrooms', $input->getBathrooms(), PDO::PARAM_INT); 
        $stmt->bindParam(':description', $input->getDescription(), PDO::PARAM_STR);   
        $stmt->bindParam(':when_modified', date("Y/m/d"), PDO::PARAM_STR);   
        $stmt->bindParam(':id', $input->getId(), PDO::PARAM_INT);   

        $stmt->execute();       
    }
}
