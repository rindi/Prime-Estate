<?php

/**
 * user_model Class
 */
class user_model
{
    //fields for userdata class
    public $bedrooms, $bathrooms, $price, $zip, $personalinformation, $userid;
    
    public function __construct($dbRow)
    { 
        $this->bedrooms = $dbRow['bedrooms'];
        $this->bathrooms = $dbRow['bathrooms'];
        $this->price = $dbRow['price'];
        $this->zip = $dbRow['zip'];
        $this->personalinformation = $dbRow['personalinformation'];
        $this->userid = $dbRow['userid'];
    }
    public function getBathrooms()
    {
        return $this->bathrooms;
    }
    public function getBedrooms()
    {
        return $this->bedrooms;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getZip()
    {
        return $this->zip;
    }
    public function getPersonalInformation()
    {
        return $this->personalinformation;
    }
    public function getUserid($id)
    {
        return $this->userid;
    }
    public function setBathrooms($bathrooms)
    {
        $this->bathrooms = $bathrooms;
    }
    public function setBedrooms($input)
    {
        $this->bedrooms = $input;
    }
    public function setPrice($input)
    {
        $this->price = $input;
    }
    public function setZip($input)
    {
        $this->zip = $input;
    }
    public function setPersonalInformation($input)
    {
        $this->personalinformation = $input;
    }
    
    public function setUserid($input)
    {
        $this->userid = $input;
    }
    

    

}

?>
