<?php
//session_start();
require_once('DB.php');
require('User.php');

class User{
    public $bdd;
    private $id;
    public $login;

    public function __construct(){
    }

    public function setUser($user){
        $this->id =$_SESSION['id'];
    }
    

    // fonction pour crypter mes champs
    public function secure($var){
        $var = htmlspecialchars(trim($var)); 
        return $var;  
    }

//--------------------------------------- CONNEXION -------------------------------------------------------//

    public function connect(){
        $db  = new Bdd();
        $bdd = NEW PDO('mysql:dbname=reservationsalles;host=127.0.0.1', 'root','');

        if(isset($_POST['connect'])){
            $login = $_POST['login'];
            $password = $_POST['password'];
            // secure($login)
            
            if (!empty($login) && (!empty($password))) {
                $GetAllInfo = $bdd -> prepare("SELECT * FROM utilisateurs WHERE login = :login");
                $GetAllInfo->bindValue(':login', $login);
                $GetAllInfo->execute(); 
            
                $AllUserInfo = $GetAllInfo->fetch(PDO::FETCH_ASSOC);
                // var_dump($AllUserInfo['password']);
                // var_dump($password);
                    if (!empty($AllUserInfo)) {
                        //var_dump(password_verify($password, $AllUserInfo['password']));
                        if (password_verify($password, $AllUserInfo['password'])) {
                            $_SESSION['connected'] == true; 
                            $_SESSION['utilisateur'] = $AllUserInfo['login']; 
                            $_SESSION['id'] = $AllUserInfo['id'];
                            header('Location:profil.php');
                        } else {
                            echo "Mot de passe incorrect";
                        }
                    } 
                        else {
                            echo"Identifiant inconnu";
                    }
            } 
                        else {
                            echo"Identifiant incorrect";
            }
        } 

    }
        

public function register($login,$password,$confirmPW){
    // secure($login);

    if (isset($_POST["register"])){   

        if (strlen($login) <=5){  
        $_SESSION['error']="Veuillez insérer un minimum de 5 caractères dans chaque champ";
        return $_SESSION['error']; 
        }

        elseif (strlen($password) <=5) {
        $_SESSION['error']="Veuillez insérer un minimum de 5 caractères dans chaque champ"; 
        return $_SESSION['error'];   
        }

        elseif (strlen($confirmPW) <=5) {
        $_SESSION['error']="Veuillez insérer un minimum de 5 caractères dans chaque champ"; 
        return $_SESSION['error'];        
        }

        else{

            if($password == $confirmPW){

                echo"coucou4"; // else "Les mots de passe ne correspondent pas"
                $bdd = new Bdd(); 
                $pdo = $bdd->connectDb();
                $checklogin = $pdo->prepare("SELECT login FROM utilisateurs WHERE login = :login");
                $checklogin->bindValue(':login', $login);
                $checklogin->execute(); 
                $count= $checklogin->fetch();
                $password = password_hash($password, PASSWORD_DEFAULT);
    
                if (!$count) { 
                    echo"coucou5";
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
        }

        }

        

    }
}

                /*try{
                    $db = new PDO ('mysql:host=localhost;dbname=reservationsalles','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
                }
                catch (Exception $e){
                    die('Erreur : ' . $e->getMessage());
                }

                public function update($login,$password);
                $login = isset($_SESSION['utilisateur']);
                var_dump($_SESSION);

                if(isset($_POST['submit']) AND $_POST['newpassword'] != $_POST['confpassword']){
                    $error = 'Mot de passe et confirmation mot de passe différents';echo 'coucou4';
                }
                else{
                    if(isset($_POST['submit'])){ echo 'coucou5';
                        $newlogin=htmlspecialchars($_POST['newlogin']);
                        $password = password_hash($_POST['newpassword']);
                        $update= $db ->prepare("UPDATE utilisateurs SET login = :newlogin, password = :newpassword WHERE login = :login");
                        var_dump($update);
                        $update ->execute(array(
                            'newlogin' => $newlogin,
                            'newpassword' => $password,
                            'login' => $login,
                        ));
                        $ok = 'Profil modifié';
                        $_SESSION['utilisateur'] =$newlogin;
                        $login = $newlogin;
                        } 
                    }
                
            
                if (isset($ok)) {
                    echo $ok;
                    var_dump($_SESSION);
                }*/        
    }   
?>


