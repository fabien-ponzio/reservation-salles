<?php
require '../config/bdd.php';
require '../config/fonctions.php';
class User{
    private $id = '';
    public $login = '';
    //public $bdd;
  
//inscrition
// public function __construct()
// {
//     $pdo = new PDO('mysql:host=localhost;dbname=reservationsalles','root',''); 
     
// }
public function register($login,$password,$conf){
    secure($login);
    if($password==$conf){
      

    $bdd = new Bdd(); // A RETRAVAILLER
    $pdo = $bdd->getbdd(); // A RETRAVAILLER
    //$pdo = new PDO('mysql:host=localhost;dbname=reservationsalles','root',''); 
    $checklogin = $pdo->prepare("SELECT login FROM utilisateurs WHERE login = :login");
    $checklogin->bindValue(':login', $login);
    $checklogin->execute(); 
    $count= $checklogin->fetch();
    $password = password_hash($password, PASSWORD_DEFAULT);
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
}}
//connect
public function connect($login, $password){
    
}
//Update
/*public function update($login,$password){
   //$sql = "UPDATE utilisateurs SET login=:login, password=:password WHERE id=;id";
   //$pdo->prepare($sql)->execute($)
   if (isset($_SESSION['login'])){
    $login = $_SESSION['login'];
    

if(isset($_POST['newlogin']) AND !empty($_POST['newlogin']) AND $newuser['login'] != $_POST['newlogin']){
    $newlogin = ($_POST['newlogin']);
}
if(isset($_POST['oldpassword']) AND !empty($_POST['newpassword']) AND $newuser['password'] != $_POST['newpassword']){
    if(isset($_POST['oldpassword']) AND !empty($_POST['oldpassword']) AND $newuser['password'] == $_POST['oldpassword']){
        $password = $newuser['password'];
        $newpassword = ($_POST['newpassword']);
    }
    }
$pdo = new PDO('mysql:host=localhost;dbname=reservationsalles','root','');
$id = $this->$_SESSION['id'];
$stmt = $pdo->prepare("UPDATE utilisateurs SET login = :login, password = :password WHERE id = :id");
$stmt->bindValue(1,$id);
$stmt->bindValue(2,$login);
$stmt->bindValue(3,$password);
$stmt->execute([
    ':login' => $login,
    ':password' => $password
]);
}
}*/

//Deconnexion
public function disconnect(){
unset($this->id,$this->login,$this->password);
}
}
//password_hash($password, PASSWORD_DEFAULT)
?>

