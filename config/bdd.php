<?php
class Bdd 
{
    public $bdd;
    /**
     * 
     */
    public function __construct()
    {   
    $pdo = new PDO('mysql:host=localhost;dbname=reservationsalles','root',''); 
    $this->bdd = $pdo;
    
    }

    public function getbdd()
    {
        $bdd = $this->bdd;
        return $bdd;
    }
}
// function BDD(){
//     $bdd = NEW PDO('mysql:dbname=reservationsalles;host=127.0.0.1', 'root','');
//     //if(!isset($_SESSION))
//     //{
//         //session_start();
//     //}
//     return $bdd;
// }



?>