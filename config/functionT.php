<?php
require '../config/bdd.php';
require '../config/fonctions.php';
class User{
    private $id = '';
    public $login = '';
    public $email = '';
    public $bdd;
  
//inscrition
// public function __construct()
// {
//     $pdo = new PDO('mysql:host=localhost;dbname=reservationsalles','root',''); 
     
// }
public function register($login,$password){
    secure($login);

    $password = password_hash($password, PASSWORD_DEFAULT);  

    $bdd = new Bdd(); // A RETRAVAILLER
    $pdo = $bdd->getbdd(); // A RETRAVAILLER
    //$pdo = new PDO('mysql:host=localhost;dbname=reservationsalles','root',''); 
    $checklogin = $pdo->prepare("SELECT login FROM utilisateurs WHERE login = :login");
    $checklogin->bindValue(':login', $login);
    $checklogin->execute(); 
    $count= $checklogin->fetch();
    if (!$count) {
        $stmt = $pdo->prepare("INSERT INTO utilisateurs (login,password) VALUE (?,?)");
        $stmt->bindValue(1,$login);
        $stmt->bindValue(2,$password);
        $stmt->execute();
        $id = $pdo->lastInsertId();
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        header('Location:connexion.php');
        return array($login,$password);
    }
    else {
        echo"L'identifiant existe déjà!";
    }
}
//Update
public function update($login,$password){
    $pdo = new PDO('mysql:host=localhost;dbname=reservationsalles','root','');
    $id = $this->id;
    $stmt = $pdo->prepare("UPDATE utilisateurs SET login = :login, password = :password WHERE id = :id");
    $stmt->bindValue(1,$login);
    $stmt->bindValue(2,$password);
    $stmt->execute([
        ':id' => $id,
        ':login' => $login,
        ':password' => $password
    ]);
}
//Deconnexion
public function disconnect(){
unset($this->id,$this->login,$this->password);
}
}
//password_hash($password, PASSWORD_DEFAULT)
?>

