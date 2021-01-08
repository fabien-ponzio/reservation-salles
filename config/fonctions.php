<?php
// fonction pour crypter mes champs
function secure($var){
    $var = htmlspecialchars(trim($var)); 
    return $var;  
}

//--------------------------------------- CONNEXION -------------------------------------------------------//

function connect($bdd, $login, $password){
    secure($login, $password); 

    if (!empty($login) && !empty($password)) {
        $verification = $bdd -> prepare("SELECT FROM utilisateurs WHERE login=':login'");
        $verification -> bindValue(':login', $login);
        $verification -> execute();

        $count = $verification -> fetchAll(PDO::FETCH_ASSOC); 
        $query_all = $bdd -> prepare("SELECT * FROM utilisateurs WHERE login=':login'");

        else {
            echo"Identifiant incorrect";
        }

        if ($count) {
            $user = $query_all -> fetchAll(PDO::FETCH_ASSOC);
            else {
                echo"Identifiant inconnu";
            }
        }

    }



}


?>