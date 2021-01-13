<?php
session_start();
var_dump($_SESSION);
/*include '../config/functionT.php';
$newuser = new User();
$db = new PDO('mysql:host=localhost;dbname=reservationsalles','root','');
if(isset($_POST['submit-newlog']) OR isset($_POST['submit-newpw'])){
    update();
}*/

    try{
        $db = new PDO ('mysql:host=localhost;dbname=reservationsalles','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exeception $e){
        die('Erreur : ' . $e->getMessage());
    }
    if ( isset($_SESSION['login']) AND isset($_SESSION['id'])){    
        $login=$_SESSION['login'];
        $id=$_SESSION['id'];

     if(isset($_POST['submit']) AND $_POST['newpassword'] == $_POST['confpassword']){
         $error = 'Mot de passe et confirmation mot de passe différents';
     }
     else{
         if(isset($_POST['submit'])){
             $newlogin=htmlspecialchars($_POST['newlogin']);
             $password = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);
             $update= $db ->prepare("UPDATE utilisateurs SET login = :newlogin, password = :newpassword WHERE id = :id");
             $update ->execute(array(
                'newlogin' => $newlogin,
                'newpassword' => $password,
                'id' => $id,
             ));
             $ok = 'Profil modifié';
             $_SESSION['login'] =$newlogin;
             $login = $newlogin;
            } 
         }
     }  

   
     if (isset($ok)) {
         echo $ok;
     }

?>


<form action="profil.php" method="POST" id="form-pro">
                            <label for="newlogin"></label>
                            <input type="text"  name="newlogin" placeholder="Login" value=<?php if(isset($newuser->login)){echo $newuser->login ;} else {echo "";} ?> > <br>
                            <label for="oldpassword"></label>
                            <input type="password" name="newpassword" placeholder="New password"><br>
                            <label for="newpassword"></label>
                            <input type="password" name="confpassword" placeholder="Confirm Password"><br>
                            <input type="submit" name="submit" value="submit" class='boutton'><br>

                            
                    </form>