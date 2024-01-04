<?php
//http://localhost/DoctorsOfficeStudentFiles/DrOffice.php
require_once('clsPerson.php');
require_once('clsPhysician.php');
require_once('clsEmployee.php');
require_once('clsPatient.php');
require_once('clsAppt.php');

date_default_timezone_set('America/Toronto');

// Exercise 1 (Physician): dob is a string.
// THE WRONG WAY but we have to start somewhere.
$dob = '1956-04-20';
// Create object theDoc as an object of clsPhysician. Use $dob and dummy values.
$theDoc = new clsPhysician("John", "Doe", $dob, "123-456-7890", "1234", "Cardiology");

echo "<h2>Exercise 1: dob is a string, the WRONG way</h2>";
// Call method testGetsAndSets. Running it will allow you to ensure
// your data was saved properly.
echo "<p>Testing gets and sets: " . $theDoc->testGetsAndSets() . "</p>";

// Once you are sure the data is properly saved:
// Code method produceFileFolderLabel inside clsPhysician
// See notes inside the class.
echo "<p>File folder label: " . $theDoc->produceFileFolderLabel() . "</p>";

// Exercise 2 (Employee): dob and start date are hard coded date objects
echo "<h2>Exercise 2: dob and start date are hard coded date objects</h2>";

// Create a DateTime object called dob. Assign a date and time of your choice.
$dobObj = new DateTime('1980-05-15');

// Create a DateTime object called startDate. Assign a date and time of your choice.
$startDateObj = new DateTime('2010-01-01');

// Create object employee as an object of clsEmployee.
// Use the two date objects and dummy values.
$employee = new clsEmployee("Jane", "Smith", $dobObj, "987-654-3210", $startDateObj, "456789", "workPhoneValue", "workEmailValue");

// test your gets and sets
echo "<p>Testing gets and sets: " . $employee->testGetsAndSets() . "</p>";

// Once you are sure the data is properly saved:
// Code method produceFileFolderLabel inside clsEmployee
// See notes inside the class.
echo "<p>File folder label: " . $employee->produceFileFolderLabel() . "</p>";

// Exercise 3 (Patient): dob is 20 years before today's date
echo "<h2>Exercise 3: dob is 20 years before today's date</h2>";
// create date time object $dob with a value that is 20 years before the system date
$dobPatient = new DateTime();
$dobPatient->modify('-20 years');

// create object patient using $dob and dummy values.
$patient = new clsPatient("Tom", "Jones", $dobPatient, "555-123-4567");

// call testGetsAndSets
echo "<p>Testing gets and sets: " . $patient->testGetsAndSets() . "</p>";

// Once you are sure the data is properly saved:
// Code method produceFileFolderLabel inside clsPatient
// See notes inside the class.
echo "<p>File folder label: " . $patient->produceFileFolderLabel() . "</p>";

// Exercise 4 (Employee data from user)
echo "<h2>Exercise 4: employee data from user</h2>";
$SIN = '123456789';
$workPhone = '613-222-2222';
$workEmail = 'cat@cat.com';
$startYear = 2016;
$startMonth = 8;
$startDay = 2;
$month = 5;
$day = 25;
$year = 1999;
$hour = 13;
$minute = 55;
$first = "meow";
$last = "claws";
$homePhone = '555-555-5555';

// Create object $dob with no default values.
$dobEmployee = new DateTime();

// USE THE setDate and setTime METHODS to assign values to $dob.
$dobEmployee->setDate($year, $month, $day);
$dobEmployee->setTime($hour, $minute);

// Create object $startDate with no default values.
$startDateEmployee = new DateTime();

// USE THE setDate and setTime METHODS to assign values to $startDate.
$startDateEmployee->setDate($startYear, $startMonth, $startDay);

// Create object employee using the date object and the above variables
$employeeFromUser = new clsEmployee(
    $first,
    $last,
    $dobEmployee,
    $homePhone,
    $startDateEmployee,
    $SIN,
    $workPhone,
    $workEmail
);

// Code method produceFileFolderLabel. It should display:
// Employee: 123456789 meow claws Aug 2, 2016
echo "<p>File folder label: " . $employeeFromUser->produceFileFolderLabel() . "</p>";

// Exercise 5 (Age calculation)
echo "<h2>Exercise 5: Age calculation</h2>";
$dobAgeCalc = new DateTime('1982-02-18 9:12am');
// Create a patient object using $dob
$patientForAgeCalc = new clsPatient("John", "Doe", $dobAgeCalc, "123-456-7890");

// Call method calculateAge. See notes inside the class.
echo "<p>Age: " . $patientForAgeCalc->calculateAge() . "</p>";

// Exercise 6 (Next appointment date)
echo "<h2>Exercise 6: Next appointment date</h2>";
$numMonths = 2;
$numDays = 3;
$myApptDate = new DateTime('2015-8-9');
$myBookedApptTime = new DateTime('11:04am');
$myActualApptTime = new DateTime('11:55am');
$myAppt = new clsAppt($myApptDate, $myBookedApptTime, $myActualApptTime);
// Call method calcNextApptDate. See notes inside the class.
echo "<p>Next Appointment Date: " . $myAppt->calcNextApptDate($numMonths, $numDays) . "</p>";

// Exercise 7 (Early or late)
echo "<h2>Exercise 7: Early or late</h2>";
// Using the myAppt object from exercise 6, call method determineEarlyOrLate.
// See notes inside the class.
echo "<p>Appointment Status: " . $myAppt->determineEarlyOrLate() . "</p>";

// Here in DrOffice.php, echo a string:
// Your appt was booked for <BookedApptTime>.
// You saw the doctor at <ActualApptTime>.
// Your wait time was <x> minutes.
echo "<p>Your appt was booked for " . $myBookedApptTime->format('h:ia') . ". You saw the doctor at " . $myActualApptTime->format('h:ia') . ". Your wait time was " . $myAppt->calculateWaitTime() . " minutes.</p>";
?>
