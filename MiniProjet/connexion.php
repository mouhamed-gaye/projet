<?php
session_start();
$_SESSION['logged']=false;
$Users=file_get_contents("users.json");
$Users=json_decode($Users,true);
$erreur="";

if(isset($_POST['connexion'])){
    if($_POST['user']!='' && $_POST['password']!=''){
        $login=$_POST['user'];
        $password=$_POST['password'];
        $role=$_POST['genre'];
        foreach ($Users as $User) {
            if($User['login']==$login && $User['password']==$password && $User['role']==$role){
                
                $_SESSION['nom']=$User['nom'];
                $_SESSION['prenom']=$User['prenom'];
                $_SESSION['logged']=true;
                if($User['role']=="admin"){
                   header("location:Admin.php");
                   exit;
                }else{
                    header("location:Joueur.php");
                    exit;
                }
            }else{
                $erreur="<center>Login ou Password ou Rôle incorrect !</center> ";
            }

            
        }    
            
    }else{
        $erreur="<center>veuillez saisir un login et un password</center> ";
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="connexion.css" />
    <title>Page de Connexion</title>
</head>
<body>
    <div class="principale">
        <div class="debut">
            <img src="image/logo-QuizzSA[1].png" height="100%"/><h1>le plaisir du joueur</h1>
        </div>
        <form method="POST" action="connexion.php">
            <div clas="login" style="height: 100px;background-color: rgb(27, 197, 197);">
                <h3>Login Form</h3>

            </div>
        <div id="contener">
            <div class="first">
            <input id="inp1" type="text" name="user" placeholder=" Login" value="<?php if(isset($login)){ echo $login;} ?>"><br><br><br>
            </div>
            <div class="second">
            <input id="inp2" type="password" name="password" placeholder=" Password" value="<?php if(isset($password)){ echo $password;} ?>"><br><br>
                    <?php if (isset($erreur)){ ?>
                        <span style="color:red;" ><?= $erreur?></span><br>
                        <?php }?>
            </div>
            <div class="genre">
                        <label for="choix">Rôle:</label>
                            <select name="genre" id="select" value="<?php if(isset($_POST['genre'])){ echo $_POST['genre'];} ?>">
                            <option value="admin">Admin</option>
                            <option value="joueur">Joueur</option>
                            </select><br>
            </div>
            <div class="third">
                <div class="bouton">
                    <button type="submit" name="connexion">CONNEXION</button>
                </div>
                <div class="lien">
                    <a href="CreationCompte.php"><h4>S'inscrire Pour Jouer?</h4></a>
                </div>
            </div>
        </div>
        </form>
    </div>
</body>
</html>