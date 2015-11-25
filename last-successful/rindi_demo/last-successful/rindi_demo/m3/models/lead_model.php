<?php
/*
@(#)File:           Lead_Model Class
@(#)Purpose:        Model for Sales Leads
@(#)Author:         PrimeEstate
@(#)Product:        PrimeEstate Website 2014
*/

class lead_model {

    //fields for userdata class
    public $firstname, $lastname, $phone, $email, $date;

    /**
     * lead_model constructor
     * @param type $input
     */
    public function __construct($input) {
        $this->firstname = $input['firstname'];
        $this->lastname = $input['lastname'];
        $this->phone = $input['phone'];
        $this->email = $input['email'];
    }

    /**
     * function to get email address
     * @return type
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * function to set email address
     * @return type
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * function to set phone
     * @return type
     */
    public function setPhone($phone) {
        $this->phone = $phone;
    }

    /**
     * function to get contact date
     * @return type
     */
    public function setContactDate($date) {
        $this->date = $date;
    }

    /**
     * function to set contact date
     * @return type
     */
    public function getContactDate() {
        return $this->date;
    }

    /**
     * function to get first name
     * @return type
     */
    public function getFirstname() {
        return $this->firstname;
    }

    /**
     * function to get last name
     * @return type
     */
    public function getLastname() {
        return $this->lastname;
    }

    /**
     * function to get phone
     * @return type
     */
    public function getPhone() {
        return $this->phone;
    }

    /**
     * function to set first name
     * @return type
     */
    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    /**
     * function to set last name
     * @return type
     */
    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

}

?>
