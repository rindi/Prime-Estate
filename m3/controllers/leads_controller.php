<?php

/*
@(#)File:           Leads Controller Class
@(#)Purpose:        Controller for house sales leads
@(#)Author:         PrimeEstate
@(#)Product:        PrimeEstate Website 2014
*/

require_once ("../controllers/controller.php");
require_once ("../controllers/interest_controller.php");
require_once ("../controllers/profile_controller.php");
require_once ("../models/user_model.php");

class leads_controller extends controller {

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Get leads function
     * @return \lead_model
     */
    public function getLeads() {
        $sql = "SELECT * from leads";
        foreach (parent::$this->db_connect->query($sql) as $row) {
            $temp = new lead_model($row);
            $temp->setContactDate($row['date']);
            $dataSet[] = $temp;
        }

        if (!empty($dataSet))
            return $dataSet;
        else
            return null;
    }

    /**
     * Add lead to the table
     * @param type $input
     */
    public function addLead($input) {
        $sql = "INSERT INTO 
                leads (phone, firstname, lastname, email, date) 
                VALUES (:phone, :firstname, :lastname, :email, :date)";

        $stmt = $this->db_connect->prepare($sql);
        $stmt->bindParam(':phone', $input->getPhone(), PDO::PARAM_STR);
        $stmt->bindParam(':firstname', $input->getFirstname(), PDO::PARAM_STR);
        $stmt->bindParam(':lastname', $input->getLastname(), PDO::PARAM_STR);
        $stmt->bindParam(':email', $input->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(':date', date("Y/m/d"), PDO::PARAM_STR);

        $stmt->execute();
    }

}
