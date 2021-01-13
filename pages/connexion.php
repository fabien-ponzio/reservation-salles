

<?php 
require_once('../config/bdd.php');
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