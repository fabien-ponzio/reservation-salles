<?php

$bdd = NEW PDO('localhost', 'root','','discussion');
if(!isset($_SESSION))
{
    session_start();
}

?>