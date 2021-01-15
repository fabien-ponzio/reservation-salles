<?php
session_start();
var_dump($_SESSION);
include '../config/functionT.php';
//$user = new User($id,$login);
//var_dump($user);

    try{
        $db = new PDO ('mysql:host=localhost;dbname=reservationsalles','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); echo 'coucou1';
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }

     $login = $_SESSION['utilisateur'];
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
             var_dump($update);
             $ok = 'Profil modifié';
             $_SESSION['utilisateur'] =$newlogin;
             $login = $newlogin;
            } 
         }
      
   
     if (isset($ok)) {
         echo $ok;
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
