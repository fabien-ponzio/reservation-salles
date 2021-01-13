<?php
// session_start();
//require('bdd.php');



// fonction pour crypter mes champs
function secure($var){
    $var = htmlspecialchars(trim($var)); 
    return $var;  
}

//--------------------------------------- CONNEXION -------------------------------------------------------//

// function connect(){
// $db  = BDD();
$objet = new Bdd(); // A RETRAVAILLER
$db = $objet->getbdd(); // A RETRAVAILLER
// $bdd = NEW PDO('mysql:dbname=reservationsalles;host=127.0.0.1', 'root','');
if(isset($_POST['connect'])){
    $login = $_POST['login'];
    $password = $_POST['password'];
    // secure($login);
    
    
    if (!empty($login) && (!empty($password))) {
        $GetAllInfo = $db -> prepare("SELECT * FROM utilisateurs WHERE login = :login");
        $GetAllInfo->bindValue(':login', $login);
        $GetAllInfo->execute(); 
    
        $AllUserInfo = $GetAllInfo->fetch(PDO::FETCH_ASSOC);
        var_dump($AllUserInfo['password']);
        var_dump($password);
            if (!empty($AllUserInfo)) {
                var_dump(password_verify($password, $AllUserInfo['password']));
                if (password_verify($password, $AllUserInfo['password'])) {
                    $_SESSION['connected'] == true; 
                    $_SESSION['utilisateur'] = $AllUserInfo['login']; 
                    $_SESSION['id'] = $AllUserInfo['id'];
                    header('Location:profil.php');
                }
                else {
                    echo "Mot de passe incorrect";
                }
            }
            else {
                echo"Identifiant inconnu";
            }
    }else {
        echo"Identifiant incorrect";
    }
    }
    // }
    ?>


