<?php
session_start();
require '../config/fonctions.php';
//CHEMINS//
$path_index="../index.php";
$path_inscription="";
$path_connexion="connexion.php";
$path_profil="profil.php";
$path_planning="planning.php";
$path_booking="reservation.php";
$path_BookingForm="reservation-form.php";
require '../pages/header.php';


$user = new User();
// var_dump($newuser);
if (isset($_POST["register"])) {
    $login=$_POST["login"];
    $password=$_POST["password"];
    var_dump($password);
    var_dump($login);

    $user->register($login,$password);
}

?>
<!-- LIEN STYLESHEET -->
<link rel="stylesheet" href="../CSS/inscription.css">
<main id="main_register">
    <div id ="shield_title">
    <h1>Inscrivez-vous!</h1>
    </div>

    <form id="form_register" action="" method="POST">
    <label for="login">Votre identifiant:</label>
    <input class="form_input" type="text" name="login" placeholder="">
    <label for="password">Votre mot de passe:</label>
    <input class="form_input" type="password" name="password" placeholder="">
    <label for="confirmPW">Confirmez votre mot de passe:</label>
    <input class="form_input" type="password" name="confirmPW"placeholder="">
    <input class="register_input" id=register type="submit" name="register">
    </form>
</main>
</body>
</html>

<?php 
$path_img_footer1 = '../images/logobbYellow.png.';
$path_img_footer2 ='../images/logotomate.png';
$path_footer='../CSS/footer.css';
require_once('footer.php')
?>
