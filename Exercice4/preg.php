<?php
require_once"fonction.php";
$texte="je pars au marché.moudou lave les voiture ,   arranges les chaises.   pourquoi modou et pas moussa?ibou;il est mangé les glaces.venez ici!fatoumata lava les boles.";
 $phrase=decoupe_texte($texte);
 for ($i=0; $i <longueur_chaine($phrase) ; $i++) { 
     echo delete_espace($phrase[$i]);
    # echo "<br>";
 }
 echo Maj_first(Add_point("m ya jours"));
?>