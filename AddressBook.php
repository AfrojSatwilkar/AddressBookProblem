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

    public function editContact() {
        $editName = readline("Enter the first name of person to edit contact");
        $edited = false;
        for($i = 0; $i < count($this->array); $i++) {
            $name = $this->array[$i];
            echo $name->getFirstName();
            if ($editName == $name->getFirstName()) {
                $firstName = readline("Edit First Name : ");
                $lastName = readline("Edit Last Name : ");
                $address = readline("Edit Address : ");
                $city = readline("Edit City : ");
                $state = readline("Edit State : ");
                $zipCode = readline("Edit ZipCode : ");
                $mobileNumber = readline("Edit Mobile Number : ");
                $emailID = readline("Edit EmailId : ");

                $name->setFirstName($firstName);
                $name->setLastName($lastName);
                $name->setAddress($address);
                $name->setCity($city);
                $name->setState($state);
                $name->setZipCode($zipCode);
                $name->setMobileNumber($mobileNumber);
                $name->setEmailId($emailID);

                $this->array[$i] = $name;
                $this->printContact();

                $edited = true;
                break;
            }
        }
        if (!$edited) {
            echo "This name does not exist";
        }

    }

    public function printContact() {
        for($i = 0; $i < count($this->array); $i++) {
            echo $this->array[$i];
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
            $addressBook->editContact();
            break;
        case 3 :
            exit("Exit");
            break;
        default:
            echo "Invalid user input";
        
    }
}

?>
