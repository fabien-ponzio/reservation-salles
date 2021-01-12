<footer>
<?php
if (isset($_SESSION['id'])) {
        echo"        
        <form action='$deconnexion'>
        <input id='deco_bouton' type='submit' value='Deconnexion'>
        </form>;";
    }
?>
</footer>
</body>
</html>