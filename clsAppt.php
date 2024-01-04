<?php  
class clsAppt
{
    private $apptDate;
    private $bookedApptTime;
    private $actualApptTime;

    public function __construct($apptDate, $bookedApptTime, $actualApptTime)
    {
        $this->apptDate = $apptDate;
        $this->bookedApptTime = $bookedApptTime;
        $this->actualApptTime = $actualApptTime;
    }

    public function calcNextApptDate($numMonths, $numDays)
    {
        // Clone the original appt date to avoid modifying the original
        $nextApptDate = clone $this->apptDate;

        // Add months and days to get the next appt date
        $nextApptDate->modify("+{$numMonths} months +{$numDays} days");

        return "Original appt: " . $this->apptDate->format('M j, Y') . "<br>" .
               "Your next appt is in {$numMonths} months and {$numDays} days. That date is " . $nextApptDate->format('M j, Y');
    }

    public function determineEarlyOrLate()
    {
        // Calculate the difference between booked and actual appt times
        $interval = $this->bookedApptTime->diff($this->actualApptTime);

        // Calculate the total minutes
        $minutes = $interval->days * 24 * 60;
        $minutes += $interval->h * 60;
        $minutes += $interval->i;

        return $minutes;
    }

	public function calculateWaitTime()
    {
        // Calculate the difference between booked and actual appt times
        $interval = $this->bookedApptTime->diff($this->actualApptTime);

        // Calculate the total minutes
        $minutes = $interval->days * 24 * 60;
        $minutes += $interval->h * 60;
        $minutes += $interval->i;

        return $minutes;
    }

}
?>
