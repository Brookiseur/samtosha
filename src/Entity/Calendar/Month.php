<?php 

namespace App\Entity\Calendar;


use DateTime;
use Exception;



class Month {

    private $months = ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'];
    public $month;
    public $year;
    public $days = ['Lundi','Mardi','Mercred','Jeudi','Vendredi','Samedi','Dimanche'];

    /**
     * Undocumented function
     *
     * @param integer $month de 1 à 12
     * @param integer $year l'année
     * @throws \Exception
     */
    public function __construct($month = null ,$year = null)
    {
        if ($month === null || $month < 1 || $month > 12 ){
            $month= date('m');
        }
        if ($year === null ){
            $year= date('Y');
        }
        $this->month= $month;
        $this->year = $year;
    }
    

    /**
     * Renvoie le premier jour du mois
     *
     * @return DateTime
     */
    public function getStartingDay(): \DateTime {
        return new \DateTime("{$this->year}-{$this->month}-01");
        
    }
    /**
     *  Retourne le mois en toute lettre
     * @return string  
     */

    public function __toString(): string {
        return   $this->months[$this->month - 1] . ' '. $this->year;
    }

    /**
     * Renvoie le nombre de semaine dans le mois
     *
     * @return integer
     */
    public function getWeeks (): int {
        $start = $this->getStartingDay();
        $end = (clone $start)->modify('+1 month -1 day'); // le clone permet de ne pas modifier la valeur start
        if( intval($end->format('W')) === 1){
        $weeks =  intval(((clone $start)->modify('+1 month -1 week'))->format('W')) - intval($start->format('W')) + 1 ; // + 1 pour avoir le nombre de semaine exacte sachant que la derniere semaine du mois à été enlevé 
        }
        else {
        $weeks =  intval($end->format('W')) - intval($start->format('W'))  ;
        }
        if ($weeks < 0) {
            $weeks = intval($end->format('W'));
            
        }
        return $weeks;
    }

    /**
     * Renvoie le mois suivant
     *
     * @return Month
     */
    public function nextMonth(): Month
    {
        $month = $this->month +1;
        $year = $this->year;
        if( $month >12 ){
            $month= 1; 
            $year +=1;
        }
        $month = str_pad($month, 2, "0", STR_PAD_LEFT);
        return new Month($month, $year);
    }

    /**
     * Renvoie le mois précédent
     *
     * @return Month
     */
    public function previousMonth(): Month
    {
        $month = $this->month -1;
        $year = $this->year;
        if( $month < 1  ){
            $month= 12; 
            $year -=1;
        }
        $month = str_pad($month, 2, "0", STR_PAD_LEFT);
        return new Month($month, $year);
    }

}