<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/header.css">
    <title>Document</title>
    <!-- INSERER POLICE TITRE ICI -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Arimo&display=swap" rel="stylesheet">
<!-- POLICE HOVER  -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
    <!-- INSERER POLICE TXT ICI -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
<!-- LINK FONTAWESOME -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">


</head>
<body>

    <header>
    <nav id="headernav">
    <?php 
    // Le chemin de ces variables est à définir sur chaques pages
    if (isset($_SESSION['id'])) {
        echo"
        <a class='headerlink' href='$path_index'>INDEX</a>
        <a class='headerlink' href='$path_profil'>PROFIL</a>
        <a class='headerlink' href='$path_planning'>PLANNING</a>
        <a class='headerlink' href='$path_booking'>RESERVATION</a>
        <a class='headerlink' href='$path_BookingForm'>FORMULAIRE RESA</a>
        <form action='$deconnexion'>
        <input id='deco_bouton' type='submit' value='Deconnexion'>
        </form>";
    }
        
    
    // Le chemin de ces variables est à définir sur chaques pages
    else {
        echo"       
        <a href='$path_index'>INDEX</a>
        <a href='$path_inscription'>INSCRIPTION</a>
        <a href='$path_connexion'>CONNEXION</a>
        <a href='$path_planning'>PLANNING</a>";
    }
    ?>
    </nav>
    </header>
