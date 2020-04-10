<?php
/*$login="admin";
$pass="passer";
if(isset($_POST['connexion'])){
    if($_POST['user']!='' && $_POST['password']!=''){
            if($login!=$_POST['user'] || $pass!=$_POST['password']){
                echo"<center>Votre login  ou mot de passe est incorrecte</center>";
            }else{
                session_start();
                $_SESSION['login']=$login;
                $_SESSION['pass']=$pass;
                $_SESSION['logged']=true;
                header("location:question.php");
                
            }
    }else{
        echo"<center>veuillez saisir un login et un mot de passe</center> ";
    }
}




*/?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="connexion.css" />
    <title>Admin</title>
</head>
<body>
<div class="debut">
     <img src="image/logo-QuizzSA[1].png" height="100%"/><h1>le plaisir du joueur</h1>
</div>
<form method="POST" action="connexion.php">
    <div clas="login" style="height: 100px;background-color: rgb(27, 197, 197);">
        <h3>Login Form</h3>

    </div>
<div id="contener">
    <div class="first">
    <input id="inp1" type="text" name="user" placeholder=" Login"><br><br><br>
    </div>
    <div class="second">
    <input id="inp2" type="password" name="password" placeholder="Password"><br><br>
    </div>
    <div class="third">
        <button type="submit" name="connexion">CONNEXION</button><a href="CreationCompte.php"><h4>S'inscrire Pour Jouer?</h4></a>
    </div>

</div>
</form>
  
</body>
</html>