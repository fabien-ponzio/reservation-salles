<?php
class Week{
    public $days =  ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
    public $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

    //bool
    public $currentIsMonday;
    //string
    public $currentDayString;
    public $monthstring;
    //int
    public $currentDay;
    public $currentDate;
    public $mondayDate;
    public $day;
    public $month;
    public $year;

public function __construct(?int $day = null, ?int $month = null, ?int $year = null){
    if($day ===null || $day < 1 || $day >31){
        $day = intval(date('j'));
    }
    if($month === null || $month < 1 || $month > 12){
        $month = intval(date('Y'));
    }
    if($year === null){
        $year = intval(date('Y'));
    }
    $dateString = $year . '-' . $month . '-' . $day;
    $makeDate = new DateTimeImmutable($dateString);
    $this->currentDay = intval($makeDate->format('N'));

    //check si c'est lundi
    if($this->currentDay === 1){
        $this->mondayDate = $day;
        $this->currentIsMonday = TRUE;
    }
    else {
        $getMondayDate = $makeDate->modify('last monday');
        $this->mondaysDate = intval($getMondayDate->format('j'));
        $this->currentIsMonday = FALSE;
    }
// Set attribute
    $this->currentDate = $dateString;
    $this->day = $day;
    $this->month = $month;
    $this->year = $year;
    $this->currentDayString = $this->day[$this->currentDay - 1];
    $this->monthString = $this->month[$this->month - 1];

}

    /**
     * retourne le mois  en toutes lettres et l'année (ex: Mars 2018)
     * @return string
     */

    public function ToString(): string {
        return $this->month[$this->month - 1] . ' ' . $this->year;

    }
        /**
     * Retourne le nom du jour en toutes lettres
     * @param int $index
     * @return string
     */

     public function getDays(int $index): string{
         return $this->days[$index];
     }

            /**
     * renvoie la semaine suivante
     * @return Week
     */

     public function nextWeek(): Week {
         $tempDate = new DateTimeImmutable($this->currentDate);
         $dayName = $tempDate->Format('l');
         $tempDate2 = $tempDate->modify('next' . $dayName);

         $day = $tempDate2->format('j');
         $month = $tempDate2->format('n');
         $year = $tempDate2->format('Y');

        return new Week($day, $month, $year);
     }

     /**
         * retourne un objet DateTime pour faire la recherche d'événements
         * @return DateTime
         */
        public function getFirstDay(): DateTime {
            return new DateTime("{$this->year}-{$this->month}-{$this->mondayDate}");
        }
}


?>