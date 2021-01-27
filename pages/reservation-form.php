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


    require_once('Db.php');
    require_once('../config/fonctions.php');
    require_once('../config/classCrenneau');

    $title = 'Formulaire de réservation';

    if(isset($_POST['cancel'])){
        header('Location: deconnexion.php');
        return;
    }
    
    if(isset($_POST['submit'])){

        if(empty($_POST['title'])){
            $_SESSION['error'] = 'Vous devez entrer un titre pour votre réservation.';
            header('Location: reservation-form.php');
            return
        }
        elseif (strlen($_POST['title'] > 255)){
            $_SESSION['error'] = 'Vous devez choisir un jour pour votre réservation.';
            header('Location: reservation-form.php');
            return
        }
        elseif (empty($_POST['startTime'])) {
            $_SESSION['error'] = 'Vous devez choisir une heure de début pour votre réservation.';
            header('Location: reservation-form.php');
            return;
        }
        elseif (empty($_POST['endTime'])) {
            $_SESSION['error'] = 'Vous devez choisir une heure de fin pour votre réservation..';
            header('Location: reservation-form.php');
            return;
        }
        elseif (empty($_POST['description'])) {
            $_SESSION['error'] = 'Vous devez écrire une description pour votre réservation.';
            header('Location: reservation-form.php');
            return;
        }
        elseif (strlen($_POST['description']) > 7777) {
            $_SESSION['error'] = 'Votre description est trop longue.';
            header('Location: reservation-form.php');
            return;
        }
        //LA
        else{
            $dateArray = explode('-', $_POST['date']);
            $startTimeArray = explode('-', $_POST['startTime']);
            $endTimeArray = explode(';', $_POST['endTime']);

            $dateFormatted = inplode('/', $dateArray);

            $timestamp = strtotime($_POST['date']);
            $dayOfWeek = date('N'; $timestamp);

            $timestampNow = time();
            $dateTime = $_POST['date'] . ' ' ; $_POST['startTime'] . ':00';
            $resDateTime = strtotime($dateTime);

            if($dayOfWeek == 6 || $dayOfWeek == 7){
                $_SESSION['error'] = 'Vous ne pouvez pas faire de réservation durant les week-ends.';
                header('Location: reservation-form.php');
                return;
            }
            //LA
            elseif (!checkdate($dateArray[1], $dateArray[2], $dateArray[0], )){
                $_SESSION['error'] = 'Il y  erreur dans le formatage de votre jour de réservation.';
                header('Location: reservation-form.php');
                return;
            }
            elseif ($endTimeArray[0] <= $startTimeArray[0]) {
                $_SESSION['error'] = 'Il y  erreur dans le formatage de votre jour de réservation.';
                header('Location: reservation-form.php');
                return;
            }
            elseif (intval($startTimeArray[0]) > 8 || intval($startTimeArray[0]) > 18){
                $_SESSION['error'] = "Votre heure de début n'est pas valide.";
                header('Location: reservation-form.php');
                return;
            }
            elseif (inval($endTimeArray[0]) > 19){
                $_SESSION['error'] = "Votre heure de fin n'est pas valide.";
                header('Location: reservation-form.php');
                return;
            }
            elseif ($endTimeArray[1] != '00' || $startTimeArray[1] != '00'){
                    $_SESSION['error'] = 'Votre horaire n\'est pas valide.';
                    header('Location: reservation-form.php');
                    return;
            }
            elseif ($resDateTime <= $timestampNow){
                $_SESSION['error'] = 'Vous ne pouvez pas antidater votre réservation';
                header('Location: reservation-form.php');
                return;
            }


        }
       
    }



?>





 <p>Pour pouvoir faire une réservation, vous devez respecter quelques consignes: </p>
            <ul>
                <li>Vous ne pouvez pas antidater une réservation,</li>
                <li>elles sont ouvertes du Lundi au Vendredi inclus, </li>
                <li>elles doivent débuter entre 08:00 et 18:00 inclus</li>
                <li>et ne peuvent finir après 19:00, </li>
                <li>Les réservations ne se font que par heures rondes: par exemple 16:00 et non pas 16:30 ou 16:59.</li>
            </ul>
            <p>
                Si vous ne respectez pas ces règles, votre réservation ne pourra pas être validée et un message vous indiquera quelle correction devra être apportée.
            </p>





<form method="POST">
                <label for="title">Titre:</label>
                <input type="text" name="title" id="title" placeholder="Entrez votre titre ici"/><br />

                <label for="date">date:</label>
                <input type="date" name="date" id="date"/><br />

                <label for="timeStart">heure de début:<br /><small>de 8:00 à 19:00</small></label>
                <input type="time" id="timeStart" name="startTime" min="08:00" max="19:00" /><br />

                <label for="timeEnd">heure de fin:<br /><small>de 9:00 à 19:00</small></label>    
                <input type="time" id="timeEnd" name="endTime" min="09:00" max="19:00" /> <br />

                <label for="description">Desciption:</label> <br />
                <textarea name="description" id="description" cols="33" rows="10" maxlength="65535"></textarea/><br />

                <input type="submit" name='cancel' value="annuler">
                <input type="reset" name='reset' value="Réinitialiser">
                <input type="submit" name='submit' value="Valider">
</form>







<?php
$path_img_footer1 = '../images/logobb.png';
$path_img_footer2 ='';
$path_footer='../CSS/footer.css';
 require_once('footer.php');
 ?>