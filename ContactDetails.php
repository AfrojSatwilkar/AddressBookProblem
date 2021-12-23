<?php
class ContactDetails {
    protected  $firstName;
    protected  $lastName;
    protected  $address;
    protected  $city;
    protected  $state;
    protected  $emailID;
    protected  $zipCode;
    protected  $mobileNumber;

    public function __construct($firstName, $lastName, $address, $city, $state, $emailID, $zipCode, $mobileNumber) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->emailID = $emailID;
        $this->zipCode = $zipCode;
        $this->mobileNumber = $mobileNumber;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getCity() {
        return $this->city;
    }

    public function getState() {
        return $this->state;
    }

    public function getZipCode() {
        return $this->zipCode;
    }

    public function getMobileNumber() {
        return $this->mobileNumber;
    }

    public function getEmailId() {
        return $this->emailID;
    }

    public function __toString()
    {
        return "ContactDetails : \nName : " . $this->firstName . " " . $this->lastName . "\n"
        . "Address : " . $this->address . "\n"
        . "City : " . $this->city . "\n"
        . "State : " . $this->state . "\n"
        . "ZipCode : " . $this->zipCode . "\n"
        . "Mobile Number : " . $this->mobileNumber . "\n"
        . "Email Id : " . $this->emailID . "\n";
    }
}
?>