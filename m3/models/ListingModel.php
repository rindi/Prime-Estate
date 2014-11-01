<?php

class ListingData
{
    //fields for userdata class
    private $id, $address, $city, $zip, $price, $rooms, $bathrooms, $description, $userid, $when_added, $when_modified, $images;
    
    public function __construct($dbRow)
    {
        //if Listing is new, it doesn't have id
        if (count($dbRow)>8)
            $this->id = $dbRow['id'];
        $this->address = $dbRow['address'];
        $this->city = $dbRow['city'];
        $this->zip = $dbRow['zip'];
        $this->price = $dbRow['price'];
        $this->rooms = $dbRow['rooms'];
        $this->bathrooms = $dbRow['bathrooms'];
        $this->description = $dbRow['description'];
        $this->userid = $dbRow['userid'];
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
    public function getUserId()
    {
        return $this->userid;
    }
    public function getBathrooms()
    {
        return $this->bathrooms;
    }
    public function getRooms()
    {
        return $this->rooms;
    }
    public function getImages()
    {
        return $this->images;
    }
    public function setAddress($address)
    {
        $this->address = $address;
    }
    public function setCity($city)
    {
        $this->city = $city;
    }
    public function setZip($zip)
    {
        $this->zip = $zip;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function setBathrooms($bathrooms)
    {
        $this->bathrooms = $bathrooms;
    }
    public function setRooms($rooms)
    {
        $this->rooms = $rooms;
    }
    public function setImages($images)
    {
        $this->images = $images;
    }
}
?>