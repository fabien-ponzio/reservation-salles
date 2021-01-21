<?php 
require_once('../config/classCrenneau.php');
require_once('../config/classWeek.php');
require_once('../config/User.php');

$path_index="../index.php";
$path_inscription="inscription.php";
$path_connexion="";
$path_profil="profil.php";
$path_planning="planning.php";
$path_booking="reservation.php";
$path_BookingForm="reservation-form.php";
require_once('header.php');
?>


 <?php 
 session_start();

 date_default_timezone_set('Europe/Paris'); // fonction
//  var_dump(date_default_timezone_set('Europe/Paris')); 

$eventsFromDB = new Creneaux(); // pas encore créée
$tablecell = [];
$currentEvent = []; 

$actWeek = new Week($_GET['day'] ?? null, $_GET['month'] ?? null, $_GET['year'] ?? null);
// var_dump($actWeek); 
$startingDayWeek = $actWeek->getFirstday();
//modify permet de modifier l'objet "+5days -1 second"
$end =(clone $startingDayWeek)->modify('+ 5 days - 1 second'); 
// valeur de retour en faisant un var dump
// qui permet d'envoyer des conditions à partir de là 
// $eventsFromDB est un nouvel objet de la class creneau



// ça créée le décompte 
$events = $eventsFromDB -> getEventsBetweenByDayTime($startingDayWeek, $end); 
// ON COMMENCE A CREER LES BOUCLES POUR PARCOURIR LE TABLEAU
foreach ($events as $k => $event){
    $tableCell[$event['case']] = $event['length']; // ??????
}
?>
<!DOCTYPE html>
<html lang="fr">
<body>
    <main>
    <div class="calendarnav">
    <!-- on applique la methode previous week à sur les jours -->
        <a href="planning.php?day=<?= $actWeek->previousWeek()->day;?>&month=<?= $actWeek->previousWeek()->month; ?> &year=<?= $actWeek->previousWeek()->year; ?>"></a>
        <h1>planning: <?= $actWeek->ToString(); ?></h1>
        <a href="planning.php?day=<?= $actWeek->nextWeek()->day;?>&month=<?= $actWeek->nextWeek()->month; ?> &year=<?= $actWeek->nextWeek()->year; ?>"></a>
    </div>
    <table>
    <!-- colgroup permet de spécifier une colonne ou groupe de colonnes dans une table -->
    <colgroup>
        <col >
        <col>
        <col>
    </colgroup>
    </table>
    </main>
</body>
</html>


<link rel="stylesheet" href="../CSS/planning.css">
<?php
$path_img_footer1 = '../images/logobb.png';
$path_img_footer2 ='';
$path_footer='../CSS/footer.css';
 require_once('footer.php'); ?>
