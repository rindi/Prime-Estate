<?php

class ListingData
{
    //fields for userdata class
    private $id, $address, $city, $zip, $price, $rooms, $bathrooms, $description,$when_added, $when_modified;
    public function __construct($dbRow)
    {
        $this->id = $dbRow['id'];
        $this->address = $dbRow['address'];
        $this->city = $dbRow['city'];
        $this->zip = $dbRow['zip'];
        $this->price = $dbRow['price'];
        $this->rooms = $dbRow['rooms'];
        $this->bathrooms = $dbRow['bathrooms'];
        $this->description = $dbRow['description'];
        $this->when_added = $dbRow['when_added'];
        $this->when_modified = $dbRow['when_modified'];
    }
    public function getListing()
    {
        return array(  ':addr' => $addr,
                                    ':city' => $city, 
                                    ':zip' => $zip,
                                    ':price' => $price,
                                    ':rooms' => $rooms,
                                    ':brooms' => $bathrooms,
                                    ':description' => $description,
                                    ':when_added' => $when_added
                         );
    }
    public function getId()
    {
        return $this->id;
    }
    public function getAddress()
    {
        return $this->address;
    }
    public function getCity()
    {
        return $this->city;
    }
    public function getZip()
    {
        return $this->zip;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getDateAdded()
    {
        return $this->when_added;
    }
    public function getDateModified()
    {
        return $this->when_modified;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getBathrooms()
    {
        return $this->bathrooms;
    }
    public function getRooms()
    {
        return $this->rooms;
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>