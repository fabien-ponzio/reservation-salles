<?php

session_start();
//require_once('../config/bdd.php');

var_dump($_SESSION['utilisateur']);

include '../config/functionT.php';
//$user = new User($id,$login);
//var_dump($user);

    try{
        $db = new PDO ('mysql:host=localhost;dbname=reservationsalles','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }
    
     $login = isset($_SESSION['utilisateur']);
     var_dump($_SESSION);

     if(isset($_POST['submit']) AND $_POST['newpassword'] != $_POST['confpassword']){
         $error = 'Mot de passe et confirmation mot de passe différents';echo 'coucou4';
     }
     else{
         if(isset($_POST['submit'])){ echo 'coucou5';
             $newlogin=htmlspecialchars($_POST['newlogin']);
             $password = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);
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
     }

    
    
?>


<form action="profil.php" method="POST" id="form-pro">
                            <label for="newlogin"></label>
                            <input type="text"  name="newlogin" placeholder="Login"> <br>
                            <label for="oldpassword"></label>
                            <input type="password" name="newpassword" placeholder="New password"><br>
                            <label for="newpassword"></label>
                            <input type="password" name="confpassword" placeholder="Confirm Password"><br>
                            <input type="submit" name="submit" value="submit" class='boutton'><br>

                            
</form>
