<?php
include 'ContactDetails.php';
class AddressBook 
{
    public $array = [];
    public $person;
    public function addNewContact()
    {
        $firstName = readline("Enter First Name : ");
        $lastName = readline("Enter Last Name : ");
        $address = readline("Enter Address : ");
        $city = readline("Enter City : ");
        $state = readline("Enter State : ");
        $zipCode = readline("Enter ZipCode : ");
        $mobileNumber = readline("Enter Mobile Number : ");
        $emailID = readline("Enter EmailId : ");

        $this->person = new ContactDetails($firstName, $lastName, $address, $city, $state, $emailID, $zipCode, $mobileNumber);
        array_push($this->array, $this->person);
        $this->printContact();
    }

    public function printContact() {
        for($i = 0; $i < count($this->array); $i++) {
            echo "ContactDetails : \nName : " . $this->person->getFirstName() . " " . $this->person->getLastName() . "\n"
             . "Address : " . $this->person->getAddress() . "\n"
             . "City : " . $this->person->getCity() . "\n"
             . "State : " . $this->person->getState() . "\n"
             . "ZipCode : " . $this->person->getZipCode() . "\n"
             . "Mobile Number : " . $this->person->getMobileNumber() . "\n"
             . "Email Id : " . $this->person->getEmailId() . "\n";
        }
    }
}

echo "Welcome to Address Book Program";
$addressBook = new AddressBook();
while(true){
    $getUserInput = readline("Enter 1 to add new contact Enter 2 to Exit ");
    switch ($getUserInput){
        case 1 :
            $addressBook->addNewContact();
            break;
        case 2 :
            exit("Exit");
            break;
        default:
            echo "Invalid user input";
        
    }
}

?>
