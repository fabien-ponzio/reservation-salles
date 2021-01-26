<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/header.css">
    <title>Document</title>
<!--vPOLICE TITRE ICI -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">
<!-- INSERER POLICE TXT ICI -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
<!-- LINK FONTAWESOME -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">


</head>
<body>

    <header>
    <nav id="headernav">
    <ul>        
    <a class='headerlink' href="<?= $path_index ?>">INDEX</a>
    <a class='headerlink' href='<?= $path_planning ?>'>PLANNING</a>


    <?php if (empty($_SESSION['utilisateur'])) { ?>
        
        <a href='<?= $path_inscription ?>'>INSCRIPTION</a>
        <a href='<?= $path_connexion?>'>CONNEXION</a>
        
    <?php } ?> 


    <?php if (isset($_SESSION['utilisateur'])) 
    {echo
        "
        <a class='headerlink' href='$path_profil'>PROFIL</a>
        <a class='headerlink' href='$path_booking'>RESERVATION</a>
        <a class='headerlink' href='$path_BookingForm'>FORMULAIRE RESA</a>
        <form action='' method='POST'>
        <input id='logout' type='submit' value='Deconnexion' name='logout'>
        </form>
        ";
    }
    ?>
    <?php
        if (isset($_POST['logout'])) {
            session_unset();
            session_destroy();     
            header('location:../index.php');
            };
    ?>
    </ul>
    </nav>
    </header>



