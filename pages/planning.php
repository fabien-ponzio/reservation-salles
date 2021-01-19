<?php
session_start();
var_dump($_SESSION);
include '../config/functionT.php';
//$user = new User($id,$login);
//var_dump($user);

    try{
        $db = new PDO ('mysql:host=localhost;dbname=reservationsalles','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); echo 'coucou1';
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }
    