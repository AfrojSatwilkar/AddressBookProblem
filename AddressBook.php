<?php
include 'ContactDetails.php';
class AddressBook 
{
    public $array = [];
    public $person;

    /**
     * addNewContact method is used to add new contact in address book
     * @param firstName
     */
    public function addNewContact($firstName)
    {
        
        $lastName = readline("Enter Last Name : ");
        $address = readline("Enter Address : ");
        $city = readline("Enter City : ");
        $state = readline("Enter State : ");
        $zipCode = readline("Enter ZipCode : ");
        $mobileNumber = readline("Enter Mobile Number : ");
        $emailID = readline("Enter EmailId : ");
        echo "\n";

        $this->person = new ContactDetails($firstName, $lastName, $address, $city, $state, $emailID, $zipCode, $mobileNumber);
        return $this->person;
    }

    public function editContact() {

        $firstName = readline("Edit First Name : ");
        $lastName = readline("Edit Last Name : ");
        $address = readline("Edit Address : ");
        $city = readline("Edit City : ");
        $state = readline("Edit State : ");
        $zipCode = readline("Edit ZipCode : ");
        $mobileNumber = readline("Edit Mobile Number : ");
        $emailID = readline("Edit EmailId : ");

        $this->person->setFirstName($firstName);
        $this->person->setLastName($lastName);
        $this->person->setAddress($address);
        $this->person->setCity($city);
        $this->person->setState($state);
        $this->person->setZipCode($zipCode);
        $this->person->setMobileNumber($mobileNumber);
        $this->person->setEmailId($emailID);
    
        return $this->person;
    }

    public function deleteContact($book) {
        $deleteName = readline("Enter the first name of person to delete contact");
        foreach($book as $key => $values) {
            for($i = 0; $i < count($values); $i++) {
                $name = $values[$i];
                if ($deleteName == $name->getFirstName()) {
                    unset($values[$i]);
                    
                }
            }
        }
        return $book;
    }
}

?>
