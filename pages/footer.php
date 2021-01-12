<footer>
<?php
if (isset($_SESSION['id'])) {
    // à mettre dans header
        echo"        
        <form action='$deconnexion'>
        <input id='deco_bouton' type='submit' value='Deconnexion'>
        </form>;"; 
    }
?>
</footer>
</body>
</html>
