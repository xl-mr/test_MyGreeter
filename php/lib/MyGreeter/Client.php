<?php


namespace MyGreeter;

/**
 * Question 2 :
 *      if the class 'Client' is fondamental, and it's use is over plateform, then it should be irrelavent to a physical environment
 *      so the use of "date('G')" is deprecated, a hour variable is introduced
 */
class Client
{
    /**
     * @description
     *  1-"Good morning" if it is after 6am and just before 12pm
     *  2-"Good afternoon" if it is after 12pm and just before 6pm
     *  3-"Good evening" if it is after 6pm and just before 6am
     * @param int $hour
     * @return string
     * @throws \Exception
     */
    public function getGreeting(int $hour) {
        if(!is_int($hour) || $hour < 0 || $hour >= 24){
            throw new \Exception('the parameter $hour should be a integer, his value should between 0 and 23');
        }

        $greeting = 'Good morning';
        if ($hour >= 0 && $hour < 12) {
            $greeting = 'Good morning';
        } elseif ($hour >= 12 && $hour < 18) {
            $greeting = 'Good afternoon';
        } elseif ($hour >= 18 && $hour < 24) {
            $greeting = 'Good evening';
        }
        return $greeting;
    }
}