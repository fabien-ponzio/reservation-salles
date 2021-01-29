

<?php 
session_start();
require_once('../config/Db.php');
//require_once('../config/User.php');
//require_once('../config/bdd.php');
// REQUIRE 
require_once('../config/fonctions.php');
$_SESSION['User']=new User();
$_SESSION['User']->connect();
// CHEMINS
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
//$db = new Db();
//var_dump($db);
//$user = new User_connect();
//var_dump($user);
/*if (isset($_POST['login']) && isset ($_POST['password'])){ 

    $login = $_POST['login'];
    $password = $_POST['password'];

    //$connexion = $user-> connectUser($login,$password);
}*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- STYLESHEET -->
    <link rel="stylesheet" href="../CSS/connexion.css">
    <title>Document</title>
</head>
<body>
    <main id="main_connect">
    <h1>Connectez-vous!</h1>
    <form id="form_connect" action="" method="POST">
    <label for="login">Votre identifiant</label>
    <input class="form_input" type="text" name="login" id="login">
    <label for="password">Votre mot de passe</label>
    <input class="form_input" type="password" name="password">
    <input id="connect_input" type="submit" name="connect">
    </form>
    </main>
</body>
</html>
<?php
$path_img_footer1 = '../images/logobbYellow.png';
$path_img_footer2 ='../images/logotomate.PNG';
$path_footer='../CSS/footer.css';
 require_once('footer.php'); ?>
