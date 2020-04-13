<?php
 session_start();
 if ($_SESSION['logged']!=true) {
     header("location:deconnexion.php");
     exit;
 }
 $prenom=isset($_SESSION['prenom'])? $_SESSION['prenom']:'';
 $nom=isset($_SESSION['nom'])? $_SESSION['nom']:'';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Amin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="Admin.css">
    <script src="main.js"></script>
</head>
<body>
    <div class="principale">
        <div class="debut">
            <div class="one">
                <img src="image/logo-QuizzSA[1].png"/>
            </div>
            <div class="two" >
                <h1>le plaisir du joueur</h1>
            </div>
            <div class="three">
            <a name="quitter" href="deconnexion.php">Deconnexion</a>
            </div>
        </div>
        <div class="contener">
            <form action="Admin.php" method="POST" enctype="multipart/form-data">
            <h2>BIENVENUE <?php echo $nom." ".$prenom;?> SUR LA PAGE DE CREATION DE QUESTIONS</h2> 
            </form>
        </div>        
    </div>
</body>
</html>