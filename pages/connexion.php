

<?php 
require_once('../config/bdd.php');

if(isset($_POST['connect'])){
$login = $_POST['login'];
$password = $_POST['password'];

if (!empty($login) && (!empty($password))) {
    $GetAllInfo = $bdd -> prepare("SELECT * FROM utilisateurs WHERE login = :login");
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

require_once('../config/fonctions.php');
// connect();
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