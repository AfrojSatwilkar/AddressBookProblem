<?php
include 'MultipleAddressBook.php';
echo "Welcome to Address Book Program\n";
$multipleAddressBook = new MultipleAddressBook();
while(true){
    echo "1. To add The new AddressBook\n2. To add contact in AddressBook\n" 
    . "3. To edit the contact in AddressBook\n4. To delete the AddressBook\n"
    . "5. To delete the contact in AddressBook\n" 
    . "6. To Print the AddressBook\n"
    . "7. Search person from a city\n"
    . "8. Search person from a State\n"
    . "9. for Count of contacts by City State\n0. to exit\n";
    $getUserInput = readline();
    switch ($getUserInput){
        case 1 :
            $multipleAddressBook->addAddressBook();
            break;
        case 2 : 
            $multipleAddressBook->addContact();
            break;
        case 3 :
            $multipleAddressBook->editContactInBook();
            break;
        case 4 :
            $multipleAddressBook->deleteAddressBook();
            break;
        case 5 :
            $multipleAddressBook->deleteContactInBook();
            break;
        case 6 :
            $multipleAddressBook->printContact();
            break;
        case 7 :
            $cityName = readline("Enter city name : ");
            $multipleAddressBook->searchPersonByCity($cityName);
            break;
        case 8 :
            $stateName = readline("Enter state name : ");
            $multipleAddressBook->searchPersonByState($stateName);
            break;
        case 9 :
            $name = readline("Enter state name : ");
            echo "Number of contact persons in " . $name . " is " . $multipleAddressBook->contactsCount($name) . "\n";
            break;
        case 0 :
            exit("Exit");
            break;
        default:
            echo "Invalid user input";
        
    }
}
?>