<?php

session_start();

$path_index="../index.php";
$path_inscription="inscription.php";
$path_connexion="";
$path_profil="profil.php";
$path_planning="planning.php";
$path_booking="reservation.php";
$path_BookingForm="reservation-form.php";
require_once('header.php');

include '../config/fonctions.php';



    try{
        $db = new PDO ('mysql:host=localhost;dbname=reservationsalles','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }
     
     $login = isset($_SESSION['utilisateur']);


    if(isset($_SESSION['utilisateur'])){
        $login = $_SESSION['utilisateur'];
    }
    if(isset($_SESSION['password'])){
        $password = $_SESSION['password'];
    }
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
    }

    if(isset($_POST['submit'])){
        echo 'coucou3';
        if ($_POST['newpassword'] != $_POST['confpassword']){
            $error = 'Mot de passe et confirmation mot de passe différents';
        }
        elseif (empty($_POST['newpassword'])){
            $_SESSION['error'] = 'Vous ne pouvez pas utiliser un mot de passe vide.';
            header("Location: profil.php");
            return;
        }
        elseif (strlen(($_POST['newlogin'])) > 255) {
            $_SESSION['error'] = 'Votre nouveau login est trop long. Veuillez en choisir un plus court';
			header("Location: profil.php");
            return;
        }
        elseif (strlen(($_POST['newlogin'])) <=5 ) {
            $_SESSION['error']="Veuillez insérer un minimum de 5 caractères dans chaque champ"; 
            header("Location: profil.php");
            return;
        }

        elseif (strlen(($_POST['newpassword'])) > 255) {
            $_SESSION['error'] = 'Votre nouveau mot de passe est trop long. Veuillez en choisir un plus court';
			header("Location: profil.php");
            return;
        }
        
        elseif (strlen(($_POST['newpassword'])) <=5 ) {
            $_SESSION['error']="Veuillez insérer un minimum de 5 caractères dans chaque champ"; 
            header("Location: profil.php");
            return;
        }

     else{

             $newlogin=htmlspecialchars($_POST['newlogin']);
             $password = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);
             $update= $db ->prepare("UPDATE utilisateurs SET login = :newlogin, password = :newpassword, id = :id WHERE id = :id");

             $update ->execute(array(
                'newlogin' => $newlogin,
                'newpassword' => $password,
                'login' => $login,
                'id'=> $id
             ));
             $ok = 'Profil modifié';
             $_SESSION['utilisateur'] =$newlogin;
             $login = $newlogin;
            } 

      
    }

         echo " <div id='hello_profil'> Bonjour ". strtoupper($_SESSION['utilisateur']) ." prêt à reserver une salle ? </div>";


    
?>
<!-- STYLESHEET -->
<link rel="stylesheet" href="../CSS/profil.css">
<main id="main_profile">
    <h1>Mettez à jour vos identifiants !</h1>
<form id="form_profile" action="profil.php" method="POST" id="form-pro">

    <label for="newlogin">Nouveau pseudo</label>
    <input class="form_input" type="text"  name="newlogin" placeholder="Login"> <br>
    <label for="oldpassword">New password</label>
    <input class="form_input" type="password" name="newpassword" placeholder="New password"><br>
    <label for="newpassword">Confirm password</label>
    <input class="form_input" type="password" name="confpassword" placeholder="Confirm Password"><br>
    <input id="profile_input" type="submit" name="submit" value="Envoyer" class='boutton'><br>

</form>
</main>
                            
<?php
$path_img_footer1 = '../images/logobbYellow.png';
$path_img_footer2 ='../images/logotomate.PNG';
$path_footer='../CSS/footer.css';
require_once('footer.php');
?>