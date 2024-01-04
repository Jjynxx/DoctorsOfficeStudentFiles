<?php
// clsPhysician inherits clsPerson.
// clsPhysician is a subclass or concrete class
class clsPhysician extends clsPerson
{
    private $ID;  // Add this line
    private $specialty;  // Add this line

    public function __construct($pFirstName, $pLastName, $pDob, $pHomePhone, $pID, $pSpecialty)
    {
        parent::__construct($pFirstName, $pLastName, $pDob, $pHomePhone);  // Call parent constructor
        $this->setID($pID);
        $this->setSpecialty($pSpecialty);
    }

    public function getID() { return $this->ID; }
    public function setID($pID) { if ($pID != NULL) $this->ID = $pID; }
    public function getSpecialty() { return $this->specialty; }
    public function setSpecialty($pSpecialty) { if ($pSpecialty != NULL) $this->specialty = $pSpecialty; }

    public function testGetsAndSets()
    {
        // in this class Dob is a string, not a date
        // this is not the correct approach.
        return "Doctor: " . $this->getID() . " " .
            parent::getFirstName() . " " .
            parent::getLastName() . " " .
            parent::getDob()->format('Y-m-d') . " " .  // Format dob as a string
            parent::getHomePhone() . " " .
            $this->getSpecialty() . " ";
    }

    // concrete implementation of the abstract method
    // code the function to return a string with
    // Doctor: <firstname> <lastname> <specialty>
    public function produceFileFolderLabel()
    {
        return "Doctor: " . parent::getFirstName() . " " . parent::getLastName() . " " . $this->getSpecialty();
    }
}

?>
