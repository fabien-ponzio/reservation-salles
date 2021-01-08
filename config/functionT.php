<?php
 require '../config/fonctions.php';
class User{
    private $id = '';
    public $login = '';
    public $email = '';
  
//inscrition
public function register($login,$password){
    secure($login);
    $password = password_hash($password, PASSWORD_DEFAULT);  
    $pdo = new PDO('mysql:host=localhost;dbname=reservationsalles','root',''); 
    $stmt = $pdo->prepare("INSERT INTO utilisateurs (login,password) VALUE (?,?)");
    $stmt->bindValue(1,$login);
    $stmt->bindValue(2,password_hash($password, PASSWORD_DEFAULT));
    $stmt->execute();
    $id = $pdo->lastInsertId();
    $this->id = $id;
    $this->login = $login;
    $this->password = $password;
    return array($login,$password);
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

