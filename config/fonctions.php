<?php
// fonction pour crypter mes champs
function secure($var){
    $var = htmlspecialchars(trim($var)); 
    return $var;  
}

//--------------------------------------- CONNEXION -------------------------------------------------------//
// je créée fonction connect incluant variables bdd, login et password {}
//j'appelle la fonction secure sur les variables login et password 
//IF champs login et password ne sont pas vides alors ELSE = identifiant incorrect 
// variable GetAllInfo : $bdd, "selectionne tout dans la table utilisateur ou login qui est passén par secure = login entré "
// variable AllUserInfo qui sera un fetch assoc de GetAllInfos
// IF AllUserInfo existe alors ELSE = Identifiant inconnu
// IF password_verify password en claire == password crypté en bdd 
//on initialise la session et on fait un redirect sur profil.php
// ELSE "mot de passe incorrect"

// function connect()


?>


