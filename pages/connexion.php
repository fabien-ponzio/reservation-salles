

<?php 
require_once('../config/fonctions.php');
require_once('../config/bdd.php');
// je créée fonction connect incluant variables bdd, login et password {}
//j'appelle la fonction secure sur les variables login et password 
//IF champs login et password ne sont pas vides alors ELSE = identifiant incorrect 
// variable GetAllInfo : $bdd, "selectionne tout dans la table utilisateur ou login qui est passén par secure = login entré "
// variable AllUserInfo qui sera un fetch assoc de GetAllInfos
// IF AllUserInfo existe alors ELSE = Identifiant inconnu
// IF password_verify password en claire == password crypté en bdd 
//on initialise la session et on fait un redirect sur profil.php
// ELSE "mot de passe incorrect"
if(isset($_POST['connect'])){
$login = $_POST['login'];
$password = $_POST['password'];
secure($login);


if (!empty($login) && (!empty($password))) {
    $GetAllInfo = $bdd -> prepare("SELECT * FROM utilisateurs WHERE login = :login");
    $GetAllInfo->bindValue(':login', $login);
    $GetAllInfo->execute(); 

    $AllUserInfo = $GetAllInfo->fetch(PDO::FETCH_ASSOC);
    // var_dump($AllUserInfo);

        if ($GetAllInfo->rowCount()>0) {
            if (password_verify($password, $AllUserInfo['password'])) {
                $_SESSION['connected'] == true; 
                $_SESSION['utilisateur'] = $utilisateur['login']; 
                $_SESSION['id'] = $utilisateur['id'];
                header(Location:'profil.php');
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
    <label for="login">Id</label>
    <input type="text" name="login" id="login">
    <label for="password">mdp</label>
    <input type="password" name="password">
    <input type="submit" name="connect">
    </form>
</body>
</html>