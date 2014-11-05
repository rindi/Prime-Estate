<?php
require_once ("../controllers/controller.php");
require_once ("../models/listing_model.php");

/**
 * Listings Controller class
 */
class listings_controller extends controller
{
    /**
     * Constructor
     */
    public function __construct( ) 
    {
        parent::__construct();
    }
    
    /**
     * Search Listings
     * @param type $input
     * @return \ListingData
     */
    public function searchListings($input)
    {
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
            $sql = "SELECT * FROM listings WHERE * like'%$input%'"; 
            
            foreach ((array) $this->db_connect->query($sql) as $row) 
            {
                $imgstack = $this->getImages($row['id']);
                $newListing = new listing_model($row);
                $newListing->setImages($imgstack);
                $dataSet[] = $newListing;
            }
            if (!empty($dataSet))
            {
                return $dataSet;
            }
            else
            {
                return null;   
            }
        }
        
        $sql = "SELECT * FROM listings WHERE $option[$check] LIKE'%$input%'"; 
        
        foreach ($this->db_connect->query($sql) as $row) 
        {
            $imgstack = $this->getImages($row['id']);
            $newListing = new listing_model($row);
            $newListing->setImages($imgstack);
            $dataSet[] = $newListing;
        }
        if (!empty($dataSet))
            return $dataSet;
        else
            return null;
    }
 
    
   /**
     * Get Realtor's Listings from the Database
     * @return \UserData
     */
    public function getRealtorListings($realtorId)
    {
        $imgstack = array();
        $sql = "SELECT * from listings WHERE userid = '$realtorId'";
        foreach (parent::$this->db_connect->query($sql) as $row) 
        {
            $imgstack = $this->getImages($row['id']);
            $newListing = new listing_model($row);
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
        $sql = "INSERT INTO listings(address, city, zip, price, rooms, bathrooms, 
            description, userid, when_added, when_modified) VALUES (
            :address, :city, :zip, :price, :rooms, :bathrooms, 
            :description, :userid, :when_added, :when_modified)";
                                       
        $stmt = $this->db_connect->prepare($sql);
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
        $sql = "UPDATE listings SET address = :address, 
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
    
    /**
     * Delete a Listing from the database
     * @param type $id
     */
    public function deleteListing($id)
    {
        $sql = "DELETE FROM listings WHERE id =  :id";
        $stmt = $this->db_connect->prepare($sql);
        //$stmt->bindParam(':id', $id, PDO::PARAM_STR, 12);   
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);   
        $stmt->execute();
    }
    
   
    public function setImage($id, $imgName)
//    public function setImage()
    {
        $defaultPath = '/~f14g03/views/assets/images/';
        $imgName = $defaultPath.$imgName;
        $sql = "INSERT INTO images(houseid, path) VALUES (
            :houseid, :path)";
                                       
        $stmt = $this->db_connect->prepare($sql);
        $stmt->bindParam(':houseid', $id, PDO::PARAM_STR);       
        $stmt->bindParam(':path', $imgName, PDO::PARAM_STR); 
  
        $stmt->execute();  
    }
    
    /**
     * Get images associated with a listing
     * @param type $listingId
     * @return imgStack
     */
    private function getImages($listingId)
    {
        $sql = "SELECT * from images WHERE houseid = '$listingId'";
        foreach (parent::$this->db_connect->query($sql) as $row) 
        {
            $imgstack[] = $row['path'];
        }
        if (!empty($imgstack))
            return $imgstack;
        else
            return null;
    }
    
    public function getListing($id)
    {
        $sql = "SELECT * from listings WHERE id = '$id'";
        foreach (parent::$this->db_connect->query($sql) as $row) 
        {
            return $row;            
        }
    }
}
