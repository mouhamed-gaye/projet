<?php
$erreur="";
$erreur1="";
if(isset($_POST['btn-submit'])){
    $User=array();
    if($_POST['prenom']!='' && $_POST['nom']!='' && $_POST['login']!='' && $_POST['password']!='' && $_POST['password1']!=''){
     $prenom=$_POST['prenom'];
     $nom=$_POST['nom'];
     $login=$_POST['login'];
     $password=$_POST['password'];
     $password1=$_POST['password1'];
     if(!verif_login($login) && comp_password($password,$password1)){
        $User['prenom']=$prenom;
        $User['nom']=$nom;
        $User['login']=$login;
        $User['password']=$password;
        $User['role']="admin";
        $js=file_get_contents("users.json");
        $js=json_decode($js,true);
        $js[]=$User;
        $js=json_encode($js);
        file_put_contents("users.json",$js);
        header("location:index.php?lien=accueil&block=inscription");


     }else{
         if(verif_login($login)){
             $erreur="Ce login existe déja !";
         }
         if(!comp_password($password,$password1)){
             $erreur1="Passwords dissemblables !";
         }
     }

    }
}
?>
<div class="inscription">
    <form action="" method="POST" id="form-connexion" enctype="multipart/form-data">
    <div class="inscrip-gauche">
        <div class="tittle-texte">
            <div class="intro-texte">S'INSCRIRE</div>
            <div class="inscrip-texte"><p>Pour proposer des Quizz</p></div>
        </div>
        <div class="input-texte">
            <label for="" class="lbl-label">Prénom</label>
            <input type="text" name="prenom" error="error-1" class="input-label" value="<?php if(isset($prenom)){ echo $prenom;} ?>">
            <div class="error-form" id="error-1"></div>
        </div>
        <div class="input-texte">
            <label for="" class="lbl-label">Nom</label>
            <input type="text" name="nom" error="error-2" class="input-label" value="<?php if(isset($nom)){ echo $nom;} ?>">
            <div class="error-form" id="error-2"></div>
        </div>
        <div class="input-texte">
            <label for="" class="lbl-label">Login</label>
            <input type="text" name="login" error="error-3" class="input-label" value="<?php if(isset($login)){ echo $login;} ?>">
            <div class="error-form" id="error-3"> <?php if (isset($erreur)){ ?><span class="error-form" ><?= $erreur?></span><?php }?></div>
        </div>
        <div class="input-texte">
            <label for="" class="lbl-label">Password</label>
            <input type="password" name="password" error="error-4" class="input-label" value="<?php if(isset($password)){ echo $password;} ?>">
            <div class="error-form" id="error-4"></div>
        </div>
        <div class="input-texte">
            <label for="" class="lbl-label">Confirmer Password</label>
            <input type="password" name="password1" error="error-5" class="input-label" value="<?php if(isset($password1)){ echo $password1;} ?>">
            <div class="error-form" id="error-5"> <?php if (isset($erreur)){ ?><span class="error-form" ><?= $erreur1?></span><br><?php }?></div>
        </div>
        <div class="avatar-avatar">
            <label for="" class="lbl-avatar">Avatar</label>
            <input type="file" name="avatar" class="input-avatar" accept="image/*">
        </div>
        <div class="bouton-submit">
            <button class="btn-submit" name="btn-submit">Créer Compte</button>
        </div>
    </div>
    <div class="inscrip-droite">
        <div class="inscrip-first">
            <div class="inscrip-avatar-droite"></div>
        </div>
        <div class="label-inscrip">
            <label class="label-inscrip-avatar" for="">Avatar Admin</label>
        </div>
    </div>
    </form>
</div>

<script>
const inputs=document.getElementsByTagName("input");
for(input of inputs){
    input.addEventListener("keyup",function(e){
       if(e.target.hasAttribute("error")) {
        var idDivError=e.target.getAttribute("error")
        document.getElementById(idDivError).innerText=""
       }
    })

}

document.getElementById("form-connexion").addEventListener("submit", function(e){
    const inputs=document.getElementsByTagName("input");
    var error=false;
    for(input of inputs){
        if(input.hasAttribute("error")){
           var idDivError=input.getAttribute("error")
        if(!input.value){   //on verifie si le champ est vide
                document.getElementById(idDivError).innerText="Ce champ est obligatoire"
                error=true;  // on met error à true pour dire qu'on a trouvé une erreur!
            }
           
        }
    }
    if(error){
        e.preventDefault();
    }
   
})
</script>