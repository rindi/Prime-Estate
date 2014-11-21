<?php

require_once ("../controllers/controller.php");
require_once ("../models/listing_model.php");
require_once ("../models/profile_model.php");

/**
 * Listings Controller class
 */
class listings_controller extends controller {

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Search listings
     * @param type $input
     * @return \listing_model
     */
    public function searchListings($input) {
        $check = -1;
        $dataSet = array();
        if (strlen($input) == 0) {

            return NULL;
        }
        if (ctype_alpha(str_replace(' ', '', $input))) {

            $check = 1;
        } else if (ctype_digit(str_replace(' ', '', $input))) {

            $check = 0;
        } else {
            $check = 3;
        }

        if ($check == 1) {
            $sql = "SELECT * FROM listings WHERE city like '%$input%'";
            $res = $this->db_connect->query($sql);

            foreach ($res as $row) {
                $imgstack = $this->getImages($row['id']);
                $newListing = new listing_model($row);
                $newListing->setImages($imgstack);
                $dataSet[] = $newListing;
            }
        }

        if ($check == 0) {
            $sql = "SELECT * FROM listings WHERE zip like '%$input%'";
            $res = $this->db_connect->query($sql);

            foreach ($res as $row) {
                $imgstack = $this->getImages($row['id']);
                $newListing = new listing_model($row);
                $newListing->setImages($imgstack);
                $dataSet[] = $newListing;
            }
        }

        if ($check == 3) {

            $letters = "";
            $digits = "";
            $letters = preg_replace("/[^a-z\s]/i", "", $input);
            $digits = preg_replace("/[^0-9\s]/i", "", $input);
            $letters = str_replace(' ', '', $letters);
            $digits = str_replace(' ', '', $digits);
            if (strlen($letters) == 0 && strlen($digits) == 0) {
                return NULL;
            }

            $sql = "SELECT * FROM listings WHERE zip like '%$digits%' OR city like '%$letters%'  ";

            $res = $this->db_connect->query($sql);
            foreach ($res as $row) {
                $imgstack = $this->getImages($row['id']);
                $newListing = new listing_model($row);
                $newListing->setImages($imgstack);
                $dataSet[] = $newListing;
            }
        }
        return $dataSet;
    }

    /**
     * Search Recent listings function
     * @return \listing_model
     */
    public function searchRecent() {
        $past = date("Y/m/d", strtotime("-1 month"));
        $sql = "SELECT * FROM listings ORDER BY id DESC";

        $res = $this->db_connect->query($sql);
        foreach ($res as $row) {
            $imgstack = $this->getImages($row['id']);
            $newListing = new listing_model($row);
            $newListing->setImages($imgstack);
            $dataSet[] = $newListing;
        }
        return $dataSet;
    }

    /**
     * Get Realtor's Listings from the Database
     * @return \UserData
     */
    public function getRealtorListings($realtorId) {
        $imgstack = array();
        $sql = "SELECT * from listings WHERE userid = '$realtorId'";
        foreach (parent::$this->db_connect->query($sql) as $row) {
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
    public function addListing($input) {
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
     * @param type $input (id number)
     */
    public function editListing($input) {
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

        $stmt->bindParam(':address', $input[1], PDO::PARAM_STR);
        $stmt->bindParam(':city', $input[2], PDO::PARAM_STR);
        $stmt->bindParam(':zip', $input[3], PDO::PARAM_INT);
        $stmt->bindParam(':price', $input[4], PDO::PARAM_INT);
        $stmt->bindParam(':rooms', $input[5], PDO::PARAM_INT);
        $stmt->bindParam(':bathrooms', $input[6], PDO::PARAM_INT);
        $stmt->bindParam(':description', $input[7], PDO::PARAM_STR);
        $stmt->bindParam(':when_modified', date("Y/m/d"), PDO::PARAM_STR);
        $stmt->bindParam(':id', $input[0], PDO::PARAM_INT);

        $stmt->execute();
    }

    /**
     * Delete a Listing from the database
     * @param type $id
     */
    public function deleteListing($id) {
        $sql = "DELETE FROM listings WHERE id =  :id";
        $stmt = $this->db_connect->prepare($sql);
        //$stmt->bindParam(':id', $id, PDO::PARAM_STR, 12);   
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    /**
     * Set a listings image
     * @param type $id
     * @param string $imgName
     */
    public function setImage($id, $imgName) {
        $defaultPath = '/~f14g03/views/assets/images/';
        $imgName = $defaultPath . $imgName;
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
    public function getImages($listingId) {
        $sql = "SELECT * from images WHERE houseid = '$listingId'";
        foreach (parent::$this->db_connect->query($sql) as $row) {
            $imgstack[] = $row['path'];
        }
        if (!empty($imgstack))
            return $imgstack;
        else
            return null;
    }

    /**
     * Remove image based on path
     * @param type $imagePath
     */
    public function removeImage($imagePath) {
        $slash_count = 0;
        $filename = "";
        for ($i = 0; $i < strlen($imagePath); $i++) {
            if ($imagePath[$i] == '/')
                $slash_count++;
            if ($slash_count == 5) {
                $slash_count++;
                continue;
            }
            if ($slash_count == 6) {
                $filename .= $imagePath[$i];
            }
        }

        // delete from dir
        array_map('unlink', glob("/home/f14g03/public_html/views/assets/images/" . $filename));

        // delete from db
        $affected_rows = $this->db_connect->exec("DELETE FROM images WHERE path = '$imagePath'");
    }

    /**
     * Get a listing function
     * @param type $id
     * @return \listing_model
     */
    public function getListing($id) {
        $sql = "SELECT * from listings WHERE id = '$id'";
        foreach (parent::$this->db_connect->query($sql) as $row) {
            $listing = new listing_model($row);
            return $listing;
        }
    }

    /**
     * Get a users most recent listing function
     * @param type $userid
     * @return type
     */
    public function getNewListing($userid) {
        $sql = "SELECT * from listings WHERE userid = '$userid' ORDER BY id DESC LIMIT 1";
        foreach (parent::$this->db_connect->query($sql) as $row) {
            $listing = new listing_model($row);
            return $listing->getId();
        }
    }

}
