<?php
session_start();
require '../config/functionT.php';

$newuser = new User();
// var_dump($newuser);
if (isset($_POST["register"])) {
    $login=$_POST["login"];
    $password=$_POST["password"];
    // var_dump($password);
    // var_dump($login);

    $newuser->register($login,$password);
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
    <input type="text" name="login">
    <label for="password">Mdp</label>
    <input type="password" name="password">
    <label for="confirmPW">Confirmez votre mdp</label>
    <input type="password" name="confirmPW">
    <input type="submit" name="register">
    </form>

</body>
</html>