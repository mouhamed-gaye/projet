<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page de connection</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="quizz.css">
</head>
<body>
    <div class="header">
        <div class="logo"></div>
        <div class="header-text"> Le plaisir de Jouer</div>
    </div>
    <div class="content">


    <?php
    require_once("fonctions.php");
    if(isset($_GET['lien'])){
        switch($_GET['lien']){
            case "accueil":
                require_once("administration.php");
            break;
            case "jeux":
                require_once("joueur.php");
            break;
            case "player":
                require_once("inscription-player.php");
            break;
            default;
        }
    }else{
        if (isset($_GET['statut']) &&$_GET['statut']==="logout") {
            deconnexion();
        }
        require_once("connexion.php");
    }
     

    ?>
    </div>
    
</body>
</html>