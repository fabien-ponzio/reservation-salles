<?php 
// CHEMINS
$path_index="../index.php";
$path_inscription="inscription.php";
$path_connexion="connexion.php";
$path_profil="profil.php";
$path_planning="planning.php";
$path_booking="";
$path_BookingForm="reservation-form.php";
// STYLESHEET HEADER 
require_once('header.php');
// REQUIRE CONFIG 
require_once('../config/fonctions.php');
require_once('../config/classCrenneau.php');
require_once('../config/classWeek.php');
require_once('../config/User.php');

if (isset($_GET['id'])) {
    // RECUP INFO FROM DB
    $event = new Creneaux;
    $eventInfos = $event->getEventbyId($_GET['id']);

    // FORMAT DATE & TIME
    $timestampStart = strtotime($eventInfos['debut']);
    $timestampEnd = strtotime($eventInfos['fin']);
    $formated = new IntlDateFormatter('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::MEDIUM);

}
else {
    $_SESSION['error'] = "Cette page n'a pas été accédé par le planning";
}
?>
<!-- CSS -->
<link rel="stylesheet" href="../CSS/reservation.css">

<main>
<h1>Réservation</h1>

<?php
    if (isset($_SESSION['error'])):
        echo '<p class="error">' . $_SESSION['error'] . '</p>';
        unset($_SESSION['error']);
    else :
?>

    <section id="booking">

    <article class="Pbooking">
    <p>Réservation réalisée par:</p> <?= $eventInfos['login']; ?>
    </article>

    <article class="Pbooking">
    <p>titre:</p> <?= $eventInfos['titre']; ?>
    </article>

    <article class="Pbooking">
    <p>description:</p><br>
        <?= $eventInfos['description']; ?>
    </article>

    <article class="Pbooking">
    <p>Commence le </p> <?= $formated->format($timestampStart) ?>, <br>
    <p> et finit le </p> <?= $formated->format($timestampEnd); ?>.
    </article>

    </section>
    <?php endif; ?>
</main>


<?php
$path_img_footer1 = '../images/logobbYellow.png';
$path_img_footer2 ='../images/logotomate.png';
$path_footer='../CSS/footer.css';
 require_once('footer.php'); 
?>