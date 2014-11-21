<?php

/**
 * listing_model class
 */
class listing_model {

    //fields for userdata class
    private $id = null, $address, $city, $zip, $price, $rooms, $bathrooms, $description, $userid, $when_added, $when_modified, $images, $map;

    /**
     * Constructor function
     * @param type $dbRow
     */
    public function __construct($dbRow) {
        //if Listing is new, it doesn't have id
        if (count($dbRow) > 8) {
            $this->id = $dbRow['id'];
            $this->when_added = $dbRow['when_added'];
            $this->when_modified = $dbRow['when_modified'];
        }
        $this->address = $dbRow['address'];
        $this->city = $dbRow['city'];
        $this->zip = $dbRow['zip'];
        $this->price = $dbRow['price'];
        $this->rooms = $dbRow['rooms'];
        $this->bathrooms = $dbRow['bathrooms'];
        $this->description = $dbRow['description'];
        $this->userid = $dbRow['userid'];
    }

    public function getId() {
        return $this->id;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getCity() {
        return $this->city;
    }

    public function getZip() {
        return $this->zip;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getDateAdded() {
        return $this->when_added;
    }

    public function getDateModified() {
        return $this->when_modified;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getUserId() {
        return $this->userid;
    }

    public function getBathrooms() {
        return $this->bathrooms;
    }

    public function getRooms() {
        return $this->rooms;
    }

    public function getImages() {
        return $this->images;
    }

    public function setDateAdded($date) {
        $this->when_added = $date;
    }

    public function setDateModified($when_modified) {
        $this->when_modified = $when_modified;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function setZip($zip) {
        $this->zip = $zip;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setUserID($userID) {
        $this->userid = $userID;
    }

    public function setBathrooms($bathrooms) {
        $this->bathrooms = $bathrooms;
    }

    public function setRooms($rooms) {
        $this->rooms = $rooms;
    }

    public function setImages($images) {
        $this->images = $images;
    }

}

?>