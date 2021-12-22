<?php
class AddressBook {
    public $firstName;
    public $lastName;
    public $address;
    public $city;
    public $state;
    public $emailID;
    public $zipCode;
    public $mobileNumber;

    public function printContact() {
        $this->firstName = "Afroj";
        $this->lastName = "Satwilkar";
        $this->address = "Bhadkamba";
        $this->city = "Ratnagiri";
        $this->state = "Maharashtra";
        $this->emailID = "afrozsatvilkar2014@gmail.com";
        $this->zipCode = 415801;
        $this->mobileNumber = 9075528330;

        echo "Contact Details : \n";
        echo "Name : " . $this->firstName . " " . $this->lastName . "\n"
             . "Address : " . $this->address . "\n"
             . "City : " . $this->city . "\n"
             . "State : " . $this->state . "\n"
             . "ZipCode : " . $this->zipCode . "\n"
             . "Mobile Number : " . $this->mobileNumber . "\n"
             . "Email Id : " . $this->emailID . "\n";
    }
}

$addressBook = new AddressBook();
$addressBook->printContact();
?>