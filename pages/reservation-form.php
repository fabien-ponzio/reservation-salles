<?php
session_start();

    try{
        $db = new PDO ('mysql:host=localhost;dbname=reservationsalles','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); echo 'coucou1';
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }
    if(isset($_POST['debut'])){
        if($_POST['debut'] >= $_POST['fin']){
            $erreur = "L'heur de fin doit etre superieur l'heur de de debut";
        }
        else{
            $time = $_POST['date'];
            for($i=$_POST['debut']; $i< $_POST['fin']; $i++){
                $date = $time.' '.$i.':00:00';
                $stmt = $db->prepare("SELECT * FROM reservation WHERE debut = :date");
                $stmt->execute(array('date'=>$date));
                $data = $stmt->fetch();
                $row = $stmt->rowCount();
            }
        }
    }
?>