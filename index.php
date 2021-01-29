<?php
session_start();
// HEADER FOOTER
// $path_header="pages/header.php";
// $path_footer="pages/footer.php";
//PAGES
$path_index="";
$path_inscription="pages/inscription.php";
$path_connexion="pages/connexion.php";
$path_profil="pages/profil.php";
$path_planning="pages/planning.php";
$path_booking="pages/reservation.php";
$path_BookingForm="pages/reservation-form.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- LINK STYLESHEET -->
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/header.css">
    <!-- FONT TITRE -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Arimo&display=swap" rel="stylesheet">
    <!-- FONT TEXTE -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
<!-- FONT TITRE 1  -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
<!-- FONT TITRE 2  -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<?php require_once('pages/header.php');
// var_dump(__DIR__);?>
<main>
    <section>
        <article id="titreindex">
        <!-- TITREEEEEEEEEEE -->
        </article>
    </section>
    <article class="box-slide">
        <section class="slide-show">
            <a href="#" class="a-slide"> <img src="images/Bouclier-rond.png" class="img-slide" alt="logo"> </a>
            <a href="#" class="a-slide"> <img src="images/Bouclier_orque.png" class="img-slide" alt="logo"> </a>
            <a href="#" class="a-slide"> <img src="images/bouclierhyrule.png" class="img-slide" alt="logo"> </a>
            <a href="#" class="a-slide"> <img src="images/bouclier_fantaisie.png" class="img-slide" alt="logo"> </a>
            <a href="#" class="a-slide"> <img src="images/bouclier_viking.png" class="img-slide" alt="logo"> </a>
            <a href="#" class="a-slide"> <img src="images/bouclier_antique.png" class="img-slide" alt="logo"> </a>
            <a href="#" class="a-slide"> <img src="images/bouclier_america.png" class="img-slide" alt="logo"> </a>
            <a href="#" class="a-slide"> <img src="images/Furyshield-removebg-preview.png" class="img-slide" alt="logo"> </a>
            <a href="#" class="a-slide"> <img src="images/Ebonyshield.png" class="img-slide" alt="logo"> </a>
        </section>
</main>
<?php
$path_img_footer1 = 'images/logobbYellow.png';
$path_img_footer2 ='images/logotomate.png';
$path_footer='CSS/footer.css';
require_once('pages/footer.php');
?>

</body>
</html>