<?php
session_start();
// CHEMINS
$path_index="../index.php";
$path_inscription="inscription.php";
$path_connexion="";
$path_profil="profil.php";
$path_planning="planning.php";
$path_booking="reservation.php";
$path_BookingForm="reservation-form.php";
// HEADER

require_once('header.php');
var_dump($_SESSION);
require '../config/functionT.php'; 
$user = new User;
    try{
        $db = new PDO ('mysql:host=localhost;dbname=reservationsalles','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }
    //$startarray=explode(' ',$_POST['debut']);
    //var_dump($startarray);
    if(isset($_POST['submit'])){
        $debut =new DateTime($_POST['debut']);
        echo $debut->format('D - M - Y - i').'<br>';
        $fin =new DateTime($_POST['fin']);
        echo $fin->format('D - M - Y - i').'<br>';
        //die();
        if($_POST['debut'] >= $_POST['fin']){ echo 'if comparaison';
            $erreur = "L'heur de fin doit etre superieur l'heur de de debut";
        }
        else{
            var_dump($_POST);
           
            $time = $_POST['date'];
            for($i=$_POST['debut']; $i< $_POST['fin']; $i++){
                $date = $time.' '.$i.':00:00';
                $stmt = $db->prepare("SELECT * FROM reservations WHERE debut = :date");
                $stmt->execute(array('date'=>$date));
                $data = $stmt->fetch();
                $row = $stmt->rowCount();

            if($row === 1){
                $erreur2 = 'Cet horrais est deja reservé.';
            continue;
            }
            }
           if(!isset($erreur2)){
               $querry = $db->prepare("INSERT INTO reservation(titre, description, debut, fin, id_utilisateur) VALUE(:titre, :description, :debut, :fin, :id_utilisateur)");
               $querry->execute(array(
                    'titre'=>htmlspecialchars($_POST['titre']),
                    'description'=>htmlspecialchars($_POST['description']),
                    'debut'=>htmlspecialchars($_POST['date'].''.$_POST['debut'].'00:00'),
                    'fin'=>htmlspecialchars($_POST['date'].''.$_POST['fin'].'00:00'),
                    'id_utilisateur' => $_SESSION['id']
               ));
               $ok = 'Vous avez réservé la Salle pour le '.$_POST['date'].' de '.$_POST['debut'].' heures à '.$_POST['fin'].' heures.';
           } 
        }
    }
?>

<link rel="stylesheet" href="../CSS/reservation-form.css">
<form action="reservation-form.php" method="POST" id="form-resa">
                            <label for="titre"></label>
                            <input type="text"  name="titre" placeholder="Titre"> <br>
                            <label for="description"></label>
                            <input type="description" name="description" placeholder="description"><br>
                            <label for="debut"></label>
                            <input type="datetime-local" name="debut" placeholder="Debut"><br>
                            <label for="fin"></label>
                            <input type="datetime-local" name="fin" placeholder="fin"><br>
                            <input type="submit" name="submit" value="submit" class='boutton'><br>
</form>

<?php
$path_img_footer1 = '../images/logobb.png';
$path_img_footer2 ='';
$path_footer='../CSS/footer.css';
 require_once('footer.php');
 ?>