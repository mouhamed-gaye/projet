<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>incription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="inscription.css">
    <script src="main.js"></script>
</head>
<body>
<div class="debut">
     <img src="image/logo-QuizzSA[1].png" height="100%"/><h1>le plaisir du joueur</h1>
</div>
<div class="contener">
    <form action="CreationCompte.php" method="POST" enctype="multipart/form-data">
        <div class="droite">
            <div class="avatar"></div>
            <label class="label7">Avatar du joueur</label><br>
        </div>
        <div class="gauche">
            <div class="haute">
            <h2>S'INSCRIRE</h2>
                <p>Pour tester votre niveau de culture générale</p>
            </div>
            <div class="input">
            <label class="label1">Prénom</label><br>
            <input class="prenom" type="text" ><br>
            <label class="label2">Nom</label><br>
            <input class="nom" type="text" ><br>
            <label class="label3">Login</label><br>
            <input class="login" type="text" ><br>
            <label class="label4">Password</label><br>
            <input class="password" type="password" ><br>
            <label class="label5">Confirmer Password</label><br>
            <input class="password1" type="password" ><br>
            </div>
            <div class="bouton">
            <label class="label6">Avatar</label>
            <button id="btn1">Choisir un fichier</button><br><br>
            <button id="btn2">Creer Compte</button>
            </div>

        </div>
    </form>
</div>
</body>
</html>