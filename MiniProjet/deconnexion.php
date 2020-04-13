<?php
session_start();

session_unset();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <h1>ACCUEIL</h1> 
    Bonjour! Vous venez de vous déconnecter.<br>
    <p><a href="connexion.php">Connexion</a>&nbsp<a href="CreationCompte.php">Inscription</a></p>
    

</body>
</html>