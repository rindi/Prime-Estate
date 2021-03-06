<?php

/*
@(#)File:           Profile Controller Class
@(#)Purpose:        Controller for Customer Profile 
@(#)Author:         PrimeEstate
@(#)Product:        PrimeEstate Website 2014
*/

require_once ("../controllers/controller.php");
require_once ("../controllers/users_controller.php");
require_once ("../controllers/listings_controller.php");
require_once ("../models/user_model.php");
require_once ("../models/profile_model.php");

class profile_controller extends controller {

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * get profile for a customer by their id
     * @return \user_model
     */
    public function getProfile($userid) {

        $sql = "SELECT * FROM customerprofile WHERE userid = '$userid'";
        $check = 0;
        foreach ($this->db_connect->query($sql) as $row) {
            $profile = new profile_model($row);
            return $profile;
            $check = 1;
        }
        if ($check == 0) {
            $this->newProfile($userid);
            foreach ($this->db_connect->query($sql) as $row) {
                $profile = new profile_model($row);
                return $profile;
            }
        }
        return NULL;
    }

    /**
     * Create a new profile function
     */
    public function newProfile($customerid) {

        $sql = "INSERT INTO customerprofile(userid, personalinformation) VALUES (
            :userid, :profile)";

        $default_profile = "Enter more information about yourself and what kind of home you are interested in!";

        $stmt = $this->db_connect->prepare($sql);
        $stmt->bindParam(':userid', $customerid, PDO::PARAM_INT);
        $stmt->bindParam(':profile', $default_profile, PDO::PARAM_STR);

        $stmt->execute();
    }

    /**
     * Edit a Customer Profile in the Database
     * @param type $input
     */
    public function updateCustomerProfile($input) {
        $sql = "UPDATE customerprofile SET zip = :zip, 
            bedrooms = :bedrooms, 
            bathrooms = :bathrooms, 
            pricemin = :pricemin, 
            pricemax = :pricemax, 
            personalinformation = :personalinformation,
            city = :city
            WHERE userid = :userid";

        $stmt = $this->db_connect->prepare($sql);
        $stmt->bindParam(':zip', $input->getZip(), PDO::PARAM_INT);
        $stmt->bindParam(':bedrooms', $input->getBedrooms(), PDO::PARAM_INT);
        $stmt->bindParam(':bathrooms', $input->getBathrooms(), PDO::PARAM_INT);
        $stmt->bindParam(':pricemin', $input->getPricemin(), PDO::PARAM_INT);
        $stmt->bindParam(':pricemax', $input->getPricemax(), PDO::PARAM_INT);
        $stmt->bindParam(':personalinformation', $input->getPersonalInformation(), PDO::PARAM_STR);
        $stmt->bindParam(':userid', $input->getUserid(), PDO::PARAM_INT);
        $stmt->bindParam(':city', $input->getCity(), PDO::PARAM_INT);

        $stmt->execute();
    }

    /**
     * Edit a Customer Profile in the Database
     * @param type $input
     */
    public function getProfileResults($input) {
        $controller = new listings_controller();
        $results = $controller->profileSearch($input);
        echo count($results);
        var_dump($results[0]);
        return $results;
    }

}
