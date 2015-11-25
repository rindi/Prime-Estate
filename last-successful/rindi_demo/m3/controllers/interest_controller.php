<?php

/*
  @(#)File:           Interest Controller Class
  @(#)Purpose:        Controller for customer interest
  @(#)Author:         PrimeEstate
  @(#)Product:        PrimeEstate Website 2014
 */

require_once ("../controllers/controller.php");
require_once ("../controllers/users_controller.php");
require_once ("../models/user_model.php");

class interest_controller extends controller {

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Get interested customers function
     * @param type $listing
     * @return \user_model
     */
    public function getInterestedCustomers($listing) {
        $sql = "SELECT * FROM interestedcustomers WHERE id = '$listing'";
        $res = $this->db_connect->query($sql);
        foreach ($res as $row) {

            $user_controller = new users_controller();
            $temp = $user_controller->getUserInfo($row['userid']);

            $tempuser = new user_model($temp);
            $tempuser->setContactDate($row['date']);
            $dataSet[] = $tempuser;
        }
        if (!empty($dataSet))
            return $dataSet;
        else
            return null;
    }

    /**
     * Express interest in a property
     * @param type $uid
     * @param type $listing
     */
    public function expressInterest($uid, $listing) {
        $sql = "INSERT INTO interestedcustomers(userid, id, date) VALUES (
            :userid, :id, :date)";

        $stmt = $this->db_connect->prepare($sql);
        $stmt->bindParam(':userid', $uid, PDO::PARAM_INT);
        $stmt->bindParam(':id', $listing, PDO::PARAM_INT);
        $stmt->bindParam(':date', date("Y/m/d"), PDO::PARAM_STR);

        $stmt->execute();
    }

    /**
     * Get list of houses interested in
     * @param type $userid
     * @return $listing
     */
    public function getInterestedHouses($userid) {
        $sql = "SELECT * FROM interestedcustomers WHERE userid = '$userid'";
        $results = $this->db_connect->query($sql);
        $dataset = array();
        $i = 0;
        foreach ($results as $row) {
            $value = $row[1];
            $dataSet[]=$value;
            }
        if (!empty($dataSet))
            return $dataSet;
        else
            return null;
    }

}
