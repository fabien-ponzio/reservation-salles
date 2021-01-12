<?php
session_start();
include '../config/functionT.php';
$newuser = new User();
$db = new PDO('mysql:host=localhost;dbname=reservationsalles','root','');
if(isset($_POST['submit-newlog']) OR isset($_POST['submit-newpw'])){
    update();
}
?>


<form action="profil.php" method="POST" id="form-pro">
                            <label for="newlogin"></label>
                            <input type="text"  name="newlogin" placeholder="Login" value=<?php if(isset($newuser->login)){echo $newuser->login ;} else {echo "";} ?> > <br>
                            <input type="submit" name="submit-newlog" value="submit" class='boutton'><br>
                            <label for="oldpassword"></label>
                            <input type="password" name="oldpassword" placeholder="oldpassword"><br>
                            <label for="newpassword"></label>
                            <input type="password" name="newpassword" placeholder="newpassword"><br>
                            <input type="submit" name="submit-newpw" value="submit" class='boutton'><br>

                            
                    </form>