<?php
session_start();
require '../config/functionT.php';
$newuser = new User();

$newuser->register('Thejeanpascal','123');
var_dump($newuser);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
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