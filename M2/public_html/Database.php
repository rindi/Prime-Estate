<?php

require ("UserData.php");
require ("ListingData.php");
class Database
{
    private $con;
    
    /**
     * Constructor for the databse object
     */
    public function __construct()
    {
        $database = 'student_f14g03';
        $username = 'f14g03';
        $password = 'fzR-5NY-5oM-W2y';
        $host = 'localhost';
        $this->con = new PDO("mysql:host=".$host.";dbname=".$database,$username,$password);
    }
    
    /**
     * Get Users from the Database
     * @return \UserData
     */
    public function getUsers()
    {
        $sql = "SELECT * from usertable";
        foreach ($this->con->query($sql) as $row) 
        {
            $dataSet[] = new UserData($row);
        }
        if (!empty($dataSet))
            return $dataSet;
        else
            return null;
    }
    
    /**
     * Add new User:Customer
     * @param type $input
     */
    public function addUser($input)
    {
        $sql = "INSERT INTO usertable(username, password, type, email) VALUES (
            :username, :password, :type, :email)";
                                          
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':username', $input->getUserName(), PDO::PARAM_STR);       
        $stmt->bindParam(':password', $input->getUserPassword(), PDO::PARAM_STR); 
        $stmt->bindParam(':type', $input->getUserType(), PDO::PARAM_STR); 
        $stmt->bindParam(':email', $input->getUserEmail(), PDO::PARAM_STR);   
        
        $stmt->execute();  
    }
    
     /**
     * Change a user's password
     * @param type $input
     */
    public function changeUserPassword($input)
    {
        $sql = "UPDATE user SET password = :password, 
            WHERE userid = :userid";
                                          
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':userid', $input->getUserId(), PDO::PARAM_STR);   
        $stmt->bindParam(':password', $input->getUserPassword(), PDO::PARAM_STR);   
        $stmt->bindParam(':id', $input->getId(), PDO::PARAM_INT);   

        $stmt->execute();       
    }
    
    /**
     * Search Listings
     * @param type $input
     * @return \ListingData
     */
    public function searchListings($input)
    {
        echo "input is  $input\n";
        $check = 0;
        $option =  array(0=>"zip",1 => "city",2=>"");
    
        if (ctype_alpha(str_replace(' ', '', $input))) 
        {
           
            $check = 1;
            
        }
       else if (ctype_digit(str_replace(' ', '', $input))) 
        {
           
            $check = 0;
        }
        else
        {
            $check = 3;
        }
        
        if($check == 3)
        {
           
            
        $sql = "SELECT * FROM houses WHERE zip AND city like'%$input%'"; 
             
        foreach ($this->con->query($sql) as $row) 
        {
            $imgstack = $this->getImages($row['id']);
            $newListing = new ListingData($row);
            $newListing->setImages($imgstack);
            $dataSet[] = $newListing;
        }
        if (!empty($dataSet))
            return $dataSet;
        else
            return null;   
        }
         
            
        
        $sql = "SELECT * FROM houses WHERE $option[i] LIKE'%$input%'"; 
        
        
        foreach ($this->con->query($sql) as $row) 
        {
            $imgstack = $this->getImages($row['id']);
            $newListing = new ListingData($row);
            $newListing->setImages($imgstack);
            $dataSet[] = $newListing;
        }
        if (!empty($dataSet))
            return $dataSet;
        else
            return null;
    }
       /**
     * Search Listings
     * @param type $input
     * @return \ListingData
     */
    /*public function searchListings2($input)
    {
       echo "input is  $input";
       $sql = "SELECT * FROM houses WHERE zip LIKE'%$input%'";

     foreach ($this->con->query($sql) as $row) 
        {
            $imgstack = $this->getImages($row['id']);
            $newListing = new ListingData($row);
            $newListing->setImages($imgstack);
            $dataSet[] = $newListing;
        }
        if (!empty($dataSet))
            return $dataSet;
        else
            return null;
    }*/
 
    /**
     * Get Realtor's Listings from the Database
     * @return \UserData
     */
    public function getListings($realtorId)
    {
        $imgstack = array();
        $sql = "SELECT * from houses WHERE userid = '$realtorId'";
        foreach ($this->con->query($sql) as $row) 
        {
            $imgstack = $this->getImages($row['id']);
            $newListing = new ListingData($row);
            $newListing->setImages($imgstack);
            $dataSet[] = $newListing;
            
        }
        if (!empty($dataSet))
            return $dataSet;
        else
            return null;
    }
    
    /**
     * Add a Listing to the Database
     * @param type $input
     */
    public function addListing($input)
    {
        $sql = "INSERT INTO houses(address, city, zip, price, rooms, bathrooms, 
            description, userid, when_added, when_modified) VALUES (
            :address, :city, :zip, :price, :rooms, :bathrooms, 
            :description, :userid, :when_added, :when_modified)";
                                       
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':address', $input->getAddress(), PDO::PARAM_STR);       
        $stmt->bindParam(':city', $input->getCity(), PDO::PARAM_STR); 
        $stmt->bindParam(':zip', $input->getZip(), PDO::PARAM_INT);  
        $stmt->bindParam(':price', $input->getPrice(), PDO::PARAM_INT); 
        $stmt->bindParam(':rooms', $input->getRooms(), PDO::PARAM_INT);   
        $stmt->bindParam(':bathrooms', $input->getBathrooms(), PDO::PARAM_INT); 
        $stmt->bindParam(':description', $input->getDescription(), PDO::PARAM_STR);   
        $stmt->bindParam(':userid', $input->getUserId(), PDO::PARAM_STR);   
        $stmt->bindParam(':when_added', date("Y/m/d"), PDO::PARAM_STR); 
        $stmt->bindParam(':when_modified', date("Y/m/d"), PDO::PARAM_STR);   
  
        $stmt->execute();       
    }

    /**
     * Edit a Listing in the Database
     * @param type $input
     */
    public function editListing($input)
    {
        $sql = "UPDATE houses SET address = :address, 
            city = :city, 
            zip = :zip, 
            price = :price, 
            rooms = :rooms, 
            bathrooms = :bathrooms, 
            description = :description,  
            when_modified = :when_modified
            WHERE id = :id";
                                          
        $stmt = $this->con->prepare($sql);
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
    
    /**
     * Delete a Listing from the database
     * @param type $id
     */
    public function deleteListing($id)
    {
        $sql = "DELETE FROM houses WHERE id =  :id";
        $stmt = $this->con->prepare($sql);
        //$stmt->bindParam(':id', $id, PDO::PARAM_STR, 12);   
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);   
        $stmt->execute();
    }
    
    /**
     * Get images associated with a listing
     * @param type $listingId
     * @return imgStack
     */
    private function getImages($listingId)
    {
        $sql2 = "SELECT * from images WHERE houseid = '$listingId'";
        foreach ($this->con->query($sql2) as $row2) 
        {
            $imgstack[] = $row2['path'];
        }
        if (!empty($imgstack))
            return $imgstack;
        else
            return null;
    }
}
?>


