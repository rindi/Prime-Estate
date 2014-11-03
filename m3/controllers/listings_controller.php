<?php
require_once ("../controllers/controller.php");
require ("../models/listing_model.php");
class listings_controller extends controller
{
    public function __construct( ) 
    {
        parent::__construct();
        /* test if connected to db */
        // if( parent::$this->db_connect ) echo "this is finally working";
    }
    
    /**
     * Search Listings
     * @param type $input
     * @return \ListingData
     */
    public function searchListings2($input)
    {
       echo "input is  $input";
       $sql = "SELECT * FROM houses WHERE zip LIKE'%$input%'";

     foreach (parent::$this->db_connect->query($sql) as $row) 
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
     * Get Realtor's Listings from the Database
     * @return \UserData
     */
    public function getListings($realtorId)
    {
        $imgstack = array();
        $sql = "SELECT * from houses WHERE userid = '$realtorId'";
        foreach (parent::$this->db_connect->query($sql) as $row) 
        {
//            $imgstack = $this->getImages($row['id']);
            $newListing = new listing_model($row);
//            $newListing->setImages($imgstack);
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
        $sql = "UPDATE houses SET address = :address, 
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
        $sql = "DELETE FROM houses WHERE id =  :id";
        $stmt = $this->db_connect->prepare($sql);
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
        foreach (parent::$this->db_connect->query($sql) as $row2) 
        {
            $imgstack[] = $row2['path'];
        }
        if (!empty($imgstack))
            return $imgstack;
        else
            return null;
    }
    

}
