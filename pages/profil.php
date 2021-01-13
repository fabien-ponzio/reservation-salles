<?php
session_start();
var_dump($_SESSION);
require_once '../config/functionT.php';
$newuser = new User();
$newuser->update();

//$newuser->update('THEjeanjean','123');
//var_dump($newuser);
/*if (isset($_POST['submit-newlog']) OR ($_POST['submit-newpw'])){
    $update;
}
*/
/*if (isset($_SESSION['login'])){
    $login = $_SESSION['login'];
    

if(isset($_POST['newlogin']) AND !empty($_POST['newlogin']) AND $newuser['login'] != $_POST['newlogin']){
    $newlogin = ($_POST['newlogin']);
    //update($login);
}
if(isset($_POST['oldpassword']) AND !empty($_POST['newpassword']) AND $newuser['password'] != $_POST['newpassword']){
    if(isset($_POST['oldpassword']) AND !empty($_POST['oldpassword']) AND $newuser['password'] == $_POST['oldpassword']){
        $password = $newuser['password'];
        $newpassword = ($_POST['newpassword']);
        //update();
    }
}
}*/

?>


<form action="profil.php" method="POST" id="form-pro">
                            <label for="newlogin"></label>
                            <input type="text"  name="newlogin" placeholder="Login" value=<?php if(isset($user['login'])){echo $user['login'] ;} else {echo "";} ?> ><br>
                            <input type="submit" name="submit-newlog" value="submit" class='boutton'><br>
                            <label for="oldpassword"></label>
                            <input type="password" name="oldpassword" placeholder="oldpassword"><br>
                            <label for="newpassword"></label>
                            <input type="password" name="newpassword" placeholder="newpassword"><br>
                            <input type="submit" name="submit-newpw" value="submit" class='boutton'><br>

                            
</form>
