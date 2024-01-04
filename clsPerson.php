<?php


// Rename the file to clsPerson.php

// clsPerson is a super class that other classes can inherit
abstract class clsPerson
{
    protected $firstName;
    protected $lastName;
    protected $dob;
    protected $homePhone;

    // Constructor with 4 parameters
    public function __construct($pFirstName, $pLastName, $pDob, $pHomePhone)
    {
        $this->setFirstName($pFirstName);
        $this->setLastName($pLastName);
        $this->setDob($pDob);
        $this->setHomePhone($pHomePhone);
    }

    public function getFirstName() { return $this->firstName; }
    public function setFirstName($pFirstName) { if ($pFirstName != NULL) $this->firstName = $pFirstName; }
    
    public function getLastName() { return $this->lastName; }
    public function setLastName($pLastName) { if ($pLastName != NULL) $this->lastName = $pLastName; }
    
    public function getDob() { 
        // Check if $this->dob is a string; if yes, create a DateTime object
        if (is_string($this->dob)) {
            $this->dob = new DateTime($this->dob);
        }
        return $this->dob; 
    }
    
    public function setDob($pDob) { if ($pDob != NULL) $this->dob = $pDob; }
    
    public function getHomePhone() { return $this->homePhone; }
    public function setHomePhone($pHomePhone) { if ($pHomePhone != NULL) $this->homePhone = $pHomePhone; }
    
    // An abstract method is a method that does not have any code to execute.
    // It forces the subclass to implement the method and leaves all the 
    // details of the implementation to the subclass.
    // A fatal error will occur if the child does not code the method.
    // Parameters would also be included below.
    abstract public function produceFileFolderLabel();
    abstract public function testGetsAndSets();

    // Code this function to return a string:
    // Born: <birthmonth day, year> at <hour:minute:am/pm>. 
    // Today's Date: month day, year. 
    // You are <x> years <y> months <z> days <w> hours <q> minutes old.
    public function calculateAge()
    {
        // Assuming $this->dob is a DateTime object
        $dob = $this->dob;
        $currentDate = new DateTime();

        // Calculate the difference between the dates
        $ageInterval = $currentDate->diff($dob);

        // Build the age string
        $ageString = sprintf(
            "Born: %s at %s. Today's Date: %s. You are %d years %d months %d days %d hours %d minutes old.",
            $dob->format('F j, Y'),
            $dob->format('h:i A'),
            $currentDate->format('F j, Y'),
            $ageInterval->y,
            $ageInterval->m,
            $ageInterval->d,
            $ageInterval->h,
            $ageInterval->i
        );

        return $ageString;
    }
}

?>