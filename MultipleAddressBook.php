<?php 
include 'AddressBook.php';
class MultipleAddressBook {

    public $array;
    public $addressBook;

    public function __construct()
    {
        $this->addressBook = new AddressBook();
        $this->array = [];
    }

    /**
     * addAddressBook method is used to add multiple address book 
     */
    public function addAddressBook() {
        $bookName = readline("Enter Name of new Address Book: ");
        if(array_key_exists($bookName, $this->array)) {
            echo "Address book with this name exists, Enter new name : ";
            $this->addAddressBook();
        } else {
            $this->array[$bookName] = NULL;
            $newBook = readline("press 1 if you want to add another book or press any key to exit : ");
            if($newBook == 1) {
                $this->addAddressBook();
            }
        }
    }

    /**
     * addContact method is used to add multiple contact in addres book
     */
    public function addContact() {
        $newContact = readline("Enter the name of Address book to add the contact : ");
        $number = readline("Enter the number of contacts you want to enter : ");
        if(array_key_exists($newContact, $this->array)) {
            for($i = 0; $i < $number; $i++) {
                $firstName = readline("Enter First Name : ");
                foreach($this->array as $key => $values) {
                    if($key == $newContact) {
                        if($values == NULL) {
                            $this->array[$newContact][$i] = $this->addressBook->addNewContact($firstName);
                            break;
                        }
                        for($j = 0; $j < $number; $j++) {
                            if($firstName == $values[$j]->getFirstName()) {
                                echo "The entered person is already exist.\n";
                                $i--;
                                break;
                            } else {
                                $this->array[$newContact][$i] = $this->addressBook->addNewContact($firstName);
                                echo "Contact added successfully. \n";
                                break;
                            }
                        }
                    }
                } 
            }
        } else {
            echo "No book found\n";
        }
    }

    /**
     * editContactInBook method is used to edit contact in address book
     */
    public function editContactInBook() {
        $editBookName = readline("Enter Name of Address Book you want to edit: ");
        $editName = readline("Enter the first name of person to edit contact");
        $edited = false;
        if(array_key_exists($editBookName, $this->array)) {
            foreach($this->array as $key => $values) {
                for($i = 0; $i < count($values); $i++) {
                    $person = $values[$i];   
                    if($editName == $person->getFirstName()) {
                        $this->array[$key][$i] = $this->addressBook->editContact($values[$i]);
                        $edited = true;
                    }
                }
            }
        } else {
            echo "AddressBook doesn't exist, Please enter correct name.";
            $this->editContactInBook();
        }
        if ($edited == false) {
            echo "This name does not exist";
            $this->editContactInBook();
        }
    }

    /**
     * deleteAddressBook method is used to delete address book
     */
    public function deleteAddressBook() {
        $bookName = readline("Enter Name of Address Book you want to delete: ");
        if(array_key_exists($bookName, $this->array)) {
            unset($this->array[$bookName]);
        } else {
            echo "AddressBook doesn't exist, Please enter correct name.";
            $this->deleteAddressBook();
        }
    }

    /**
     * deleteContactInBook method is used to delete contact in address book
     */
    public function deleteContactInBook() {
        $bookName = readline("Enter Name of Address Book you want to delete the contacts in it: ");
        $deleteName = readline("Enter the first name of person to delete contact");
        if(array_key_exists($bookName, $this->array)) {
            foreach($this->array as $key => $values) {
                for($i = 0; $i < count($values); $i++) {
                    $person = $values[$i];
                    if($deleteName == $person->getFirstName()) {
                        unset($this->array[$key][$i]);
                    }
                }
            }
        } else {
            echo "Address Book Not Found :\n";
        }
    }

    /**
     * printContact method is used to view contact in address book
     */
    public function printContact() {
        $bookName = readline("Enter Name of Address Book");
        foreach($this->array as $key => $values) {
            if($key == $bookName) {
                echo $key . " Address Book :\n";
                foreach($values as $contact) {
                    echo $contact;
                }
            }else {
                echo "Address Book Not Found :\n";
            }
            
        }
    }

    public function searchPerson() {
        echo "1. for search by city \n2 . for search by state\n";
        $option = readline();
        switch($option) {
            case 1 :
                $cityName = readline("Enter city name : ");
                $this->searchPersonByCity($cityName);
                break;
            case 2 :
                $stateName = readline("Enter state name : ");
                $this->searchPersonByState($stateName);
                break;
            default :
                echo "Invalid Input :\n";
                continue;
        }
    }

    /**
     * searchPersonByCity method is used to search person in city
     * @param cityName
     */
    public function searchPersonByCity($cityName) {
        foreach($this->array as $key => $values) {
            for($i = 0; $i < count($values); $i++) {
                if($cityName == $values[$i]->getCity()) {
                    echo "Address Book : " . $key . "\n";
                    echo "First Name : " . $values[$i]->getFirstName() . "\n";
                    echo "Last Name : " . $values[$i]->getLastName() . "\n";
                    echo "\n";
                }
            }
        }
    }

    /**
     * searchPersonInState method is used to search person in state
     * @param stateName
     */
    public function searchPersonByState($stateName) {
        foreach($this->array as $key => $values) {
            for($i = 0; $i < count($values); $i++) {
                if($stateName == $values[$i]->getState()) {
                    echo "Address Book : " . $key . "\n";
                    echo "First Name : " . $values[$i]->getFirstName() . "\n";
                    echo "Last Name : " . $values[$i]->getLastName() . "\n";
                    echo "\n";
                }
            }
        }
    }

    /**
     * contactsCount method is used to count contact in state or city
     * @param name
     * @return count
     */
    public function contactsCount($name) {
        $count = 0;
        foreach($this->array as $key => $values) {
            for($i = 0; $i < count($values); $i++) {
                if($name == $values[$i]->getState() || $name == $values[$i]->getCity()) {
                    $count++;
                }
            }
        }
        return $count;
    }

    public function sorting() {
        echo "1. View By first name \n2. View By city \n3. View By state \n4. View by Zip code \n5. Back\n";
        $userInput = readline();
        switch($userInput) {
            case 1 : 
                $this->sortByName();
                break;
            case 2 :
                $this->sortByCity();
                break;
            case 3 :
                $this->sortByState();
                break;
            case 4 :
                $this->sortByZipCode();
                break;
            case 5 :
                return;
            default :
                echo "Invalid choice \n";
        }
    }

    /**
     * sortByName method is used to sort the address book contact alphabetically
     */
    public function sortByName() {
        $addressBook = readline("Enter Name of Address Book : ");
        foreach($this->array as $key => $values) {
            if($key == $addressBook) {
                $num = count($values);
                for ($i = 0; $i < $num-1; $i++) {
                    for ($j = $i+1; $j <= $num-1; $j++) {
                        if($values[$i]->getFirstName() > $values[$j]->getFirstName()) {
                            $tmp = $values[$i];
                            $values[$i] = $values[$j];
                            $values[$j] = $tmp;
                        }
                    }
                } 
                foreach($values as $contact) {
                    echo $contact;
                }
            }
        }
    }

     /**
     * sortByName method is used to sort the address book contact by city
     */
    public function sortByCity() {
        $addressBook = readline("Enter Name of Address Book : ");
        foreach($this->array as $key => $values) {
            if($key == $addressBook) {
                $num = count($values);
                for ($i = 0; $i < $num-1; $i++) {
                    for ($j = $i+1; $j <= $num-1; $j++) {
                        if($values[$i]->getCity() > $values[$j]->getCity()) {
                            $tmp = $values[$i];
                            $values[$i] = $values[$j];
                            $values[$j] = $tmp;
                        }
                    }
                } 
                foreach($values as $contact) {
                    echo $contact;
                }
            }
        }
    }

     /**
     * sortByName method is used to sort the address book contact by state
     */
    public function sortByState() {
        $addressBook = readline("Enter Name of Address Book : ");
        foreach($this->array as $key => $values) {
            if($key == $addressBook) {
                $num = count($values);
                for ($i = 0; $i < $num-1; $i++) {
                    for ($j = $i+1; $j <= $num-1; $j++) {
                        if($values[$i]->getState() > $values[$j]->getState()) {
                            $tmp = $values[$i];
                            $values[$i] = $values[$j];
                            $values[$j] = $tmp;
                        }
                    }
                } 
                foreach($values as $contact) {
                    echo $contact;
                }
            }
        }
    }

     /**
     * sortByName method is used to sort the address book contact by zip code
     */
    public function sortByZipCode() {
        $addressBook = readline("Enter Name of Address Book : ");
        foreach($this->array as $key => $values) {
            if($key == $addressBook) {
                $num = count($values);
                for ($i = 0; $i < $num-1; $i++) {
                    for ($j = $i+1; $j <= $num-1; $j++) {
                        if($values[$i]->getZipCode() > $values[$j]->getZipCode()) {
                            $tmp = $values[$i];
                            $values[$i] = $values[$j];
                            $values[$j] = $tmp;
                        }
                    }
                } 
                foreach($values as $contact) {
                    echo $contact;
                }
            }
        }
    }
}
?>