<?php

class User{
    private $id = '';
    public $login = '';
    public $email = '';


public function register($login,$password){
$pdo = new PDO('mysql:host=localhost;dbname=reservationsalles','root',''); 
$stmt = $pdo->prepare('INSERT INTO utilisateurs (login,password) VALUE (?,?)');
$stmt->bindValue(1,$login);
$stmt->bindValue(2,$password);
$stmt->execute();
$id = $pdo->lastInsertId();
$this->id = $id;
$this->login = $login;
$this->password = $password;
return array($login,$password);
} 
}

?>