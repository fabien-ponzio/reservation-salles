<?php
//session_start();
//require('bdd.php');


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
        // $db  = BDD();
        //$objet = new Bdd(); // A RETRAVAILLER
        //$db = $objet->getbdd(); // A RETRAVAILLER
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
                var_dump($AllUserInfo['password']);
                var_dump($password);
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
                    } else {
                        echo"Identifiant inconnu";
                    }
            } else {
                echo"Identifiant incorrect";
            }
        } 

    }
        

    public function register($login,$password){
        // secure($login);
        if($_POST["password"]==$_POST['confirmPW']){
            echo"coucou";
        }
    
        if($_POST["password"]==$_POST['confirmPW']){
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

?>


