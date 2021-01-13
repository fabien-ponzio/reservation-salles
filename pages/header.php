<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- INSERER POLICE TITRE ICI -->
    <!-- INSERER POLICE TXT ICI -->

</head>
<body>

    <header>
    <nav id="headernav">
    <?php 
    // Le chemin de ces variables est à définir sur chaques pages
    if (isset($_SESSION['id'])) {
        echo"
        <a href='$path_index'></a>
        <a href='$path_profil'></a>
        <a href='$path_planning'></a>
        <a href='$path_booking'></a>
        <a href='$path_BookingForm'></a>
        <form action='$deconnexion'>
        <input id='deco_bouton' type='submit' value='Deconnexion'>
        </form>";
    }
        
    
    // Le chemin de ces variables est à définir sur chaques pages
    else {
        echo"       
        <a href='$path_index'></a>
        <a href='$path_inscription'></a>
        <a href='$path_connexion'></a>
        <a href='$path_planning'></a>";
    }
    ?>
    </nav>
    </header>
