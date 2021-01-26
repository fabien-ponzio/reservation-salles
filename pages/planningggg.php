<?php
//require des pages
require_once('../config/classCrenneau.php');
require_once('../config/classWeek.php');
require_once('../config/User.php');

// CONSTRUCTION DU TABLEAU (LIGNES)
// Y = ROW    X=COL
for ($row=0; $row < 12 ; $row++) { 
   echo'<tr>', "\n";
//    echo"<pre>
//    var_dump($row);
//     echo</pre>";

// CONSTRUCTION DES COLONNES 

    for ($col=0; $col < 1 ; $col++) { // ON ESSAYE POUR 1J
        $position = $row . '-' . $col; 
        $cellule = null; 
        // echo"<pre>
        // var_dump($col);
        //  echo</pre>";

        if ($row === 0 && $col === 0) {
           echo"<th>Horaires</th>";
        }

        elseif ($row == 0 && $col > 0) {
            // on fait ca pour que notre tableau commence rééellement à 0
            $daysNumber = $actWeek->mondaysDate + $col - 1 ;
            echo'<th>' . $actWeek->getDays($col - 1) . ' ' . $daysNumber . '</th>';
        }
    }
}
?>
