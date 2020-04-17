<?php
$erreur="";

if(isset($_POST['btn-form'])){
        $login=$_POST['login'];
        $password=$_POST['password'];
        $result=connexion($login,$password);
        if($result=="error"){
            $erreur="<center>login ou mot de passe incorrect</center>";
        }else{
            header("location:index.php?lien=".$result);
        }
        
    }
?>
<div class="contener">
    <div class="contener-header">
        <div class="title">Login Form</div>
    </div>
    <div class="contener-body">
        <form action="" method="POST">
            <div class="input-form">
                <div class="icon-form" icon-form-login></div>
                <input type="text" class="form-control" name="login" value="<?php if(isset($login)){ echo $login;} ?>" placeholder="login">
            </div>
            <div class="input-form" >
                <div class="icon-form" icon-form-pwd></div>
                <input type="password" class="form-control" name="password" value="<?php if(isset($password)){ echo $password;} ?>" placeholder="password">
            </div>
            <div class="input-form">
            <?php if (isset($erreur)){ ?><span class="error-form" ><?= $erreur?></span><br><?php }?>
            <button type="submit" class="btn-form" name="btn-form">Connexion</button>
            <a href="inscription-player.php?lien=loguer=player" class="link-form">S'inscrire pour Jouer?</a>


            </div>

        </form>
    </div>
</div>