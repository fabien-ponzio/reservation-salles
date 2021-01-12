<?php
function BDD(){
    $bdd = NEW PDO('mysql:dbname=reservationsalles;host=127.0.0.1', 'root','');
    //if(!isset($_SESSION))
    //{
        //session_start();
    //}
    return $bdd;
}


?>