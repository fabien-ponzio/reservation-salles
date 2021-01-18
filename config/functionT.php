<?php

require '../config/bdd.php';
require '../config/fonctions.php';
class User{
    private $id = '';
    public $login = '';
    public $bdd;

    public function __construct(){
    }
    public function setUser($user){
        $this->id =$_SESSION['id'];
    }
    
  
//inscrition
// // public function __construct()
// {
//     $pdo = new PDO('mysql:host=localhost;dbname=reservationsalles','root',''); 
     
// }
public function register($login,$password){
    // secure($login);
    if($_POST["password"]==$_POST['confirmPW']){
        echo"coucou";

    // secure($login);

/*if (!empty($login) && !empty($password) && !empty($confirmPW)){ echo"coucou2";// else "les champs doivent être remplis"
    $loglength = strlen($login);
    $passlength = strlen($password);
    $confirmpasslength = strlen($confirmPW);

    if(($loglength >=5) && ($passlength >=5) && ($confirmpasslength >=5)){echo"coucou3";*/ // else "veuillez insérer au moins 5"

        if($_POST["password"]==$_POST['confirmPW']){echo"coucou4"; // else "Les mots de passe ne correspondent pas"
                $bdd = new Bdd(); 
                $pdo = $bdd->getbdd(); 
                $checklogin = $pdo->prepare("SELECT login FROM utilisateurs WHERE login = :login");
                $checklogin->bindValue(':login', $login);
                $checklogin->execute(); 
                $count= $checklogin->fetch();
                $password = password_hash($password, PASSWORD_DEFAULT);

                if (!$count) { echo"coucou5";
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
                //else {
                    //echo"Ce nom d'utilisateur est déjà pris";
                //}
            }
            //else {
                //echo"Les mots de passes insérés ne correspondent pas";
           // }
        }
        //else {
            //echo"Veuillez insérer au moins 5 caractères dans chaques champs";
        //}
    }
    //else {
       // echo "Les champs doivent être remplis"; 
   // }
//}
//}
}


?>

