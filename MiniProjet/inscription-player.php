<?php
$erreur="";
$erreur1="";
if(isset($_POST['btn-submit-player'])){
    $User=array();
    if($_POST['prenom']!='' && $_POST['nom']!='' && $_POST['login']!='' && $_POST['password']!='' && $_POST['password1']!=''){
        $file=$_FILES['avatar'];
        $prenom=$_POST['prenom'];
        $nom=$_POST['nom'];
        $login=$_POST['login'];
        $password=$_POST['password'];
        $password1=$_POST['password1'];
   #Traitement sur l'upload de l'image de profil
        $fileName=$_FILES['avatar']['name'];
        $fileTmpName=$_FILES['avatar']['tmp_name'];
        $fileSize=$_FILES['avatar']['size'];
        $fileError=$_FILES['avatar']['error'];
        $fileType=$_FILES['avatar']['type'];
        $fileExt=explode('.',$fileName);
        $fileActuelExt=strtolower(end($fileExt));
        $allowed= array('jpg','png','jpeg');
   #vérification des logins passwords et sur le téléchargement de l'image de profil
     if(!verif_login($login) && comp_password($password,$password1)){
        if(in_array($fileActuelExt,$allowed)){
            if($fileError===0){
                if($fileSize<2000000){
                    $fileNameNew=$login.".".$fileActuelExt;
                    $fileDestination='uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName,$fileDestination);
#enregistrement des données dans le fichier json
                    $User['prenom']=$prenom;
                    $User['nom']=$nom;
                    $User['login']=$login;
                    $User['password']=$password;
                    $User['role']="joueur";
                    $User['avatar']=$fileNameNew;
                    $js=file_get_contents("users.json");
                    $js=json_decode($js,true);
                    $js[]=$User;
                    $js=json_encode($js);
                    file_put_contents("users.json",$js);
                    header("location:index.php?lien=jeux");
                    exit;
                }else{
                    $message="Taille du fichier trés grande";
                }

            }else{
                $message="Erreur de téléchargement !";
            }

        }else{
            $message="Type de fichier non pris en charge !";
        }
        

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
<div class="inscription-player">
    <form action="" method="POST" id="form-connexion" enctype="multipart/form-data">
        <div class="inscrip-gauche-player">
            <div class="tittle-texte-player">
                <div class="intro-texte-player">S'INSCRIRE</div>
                <div class="inscrip-texte-player"><p>Pour tester votre niveau de culture général</p></div>
            </div>
            <div class="input-texte-player">
                <label for="" class="lbl-label-player">Prénom</label>
                <input type="text" class="input-label-player" name="prenom" error="error-1" value="<?php if(isset($prenom)){ echo $prenom;} ?>">
                <div class="error-form" id="error-1"></div>
            </div>
            <div class="input-texte-player">
                <label for="" class="lbl-label-player">Nom</label>
                <input type="text" class="input-label-player"name="nom" error="error-2" value="<?php if(isset($nom)){ echo $nom;} ?>">
                <div class="error-form" id="error-2"></div>
            </div>
            <div class="input-texte-player">
                <label for="" class="lbl-label-player">Login</label>
                <input type="text" class="input-label-player" name="login" error="error-3" value="<?php if(isset($login)){ echo $login;} ?>">
                <div class="error-form" id="error-3"><?php if (isset($erreur)){ ?><span class="error-form" ><?= $erreur?></span><?php }?></div>
            </div>
            <div class="input-texte-player">
                <label for="" class="lbl-label-player">Password</label>
                <input type="password" class="input-label-player" name="password" error="error-4" value="<?php if(isset($password)){ echo $password;} ?>">
                <div class="error-form" id="error-4"><?php if (isset($erreur)){ ?><span class="error-form" ><?= $erreur1?></span><br><?php }?></div>
            </div>
            <div class="input-texte-player">
                <label for="" class="lbl-label-player">Confirmer Password</label>
                <input type="password" class="input-label-player" name="password1" error="error-5" value="<?php if(isset($password1)){ echo $password1;} ?>">
                <div class="error-form" id="error-5"><?php if (isset($erreur1)){ ?><span class="error-form" ><?= $erreur1?></span><br><?php }?></div>
            </div>
            <label class="lbl-avatar-player1">Avatar</label>
            <div class="avatar-avatar-player">
                <label for="file" class="lbl-avatar-player">Chercher un fichier</label>
                <input type="file" id="file" name="avatar" error="error-6" class="input-avatar-player" accept="image/*" onchange="loadFile(event)">
            </div>
            <div class="bouton-submit-player">
                <button type="submit" class="btn-submit-player" name="btn-submit-player">Créer Compte</button>
            </div>
        </div>
        <div class="inscrip-droite-player">
            <div class="inscrip-first-player">
            <img class="inscrip-avatar-droite-player" id="output">
            </div>
            <div class="label-inscrip-player">
                <label class="label-inscrip-avatar-player" for="">Avatar Admin</label>
                <div class="error-form" id="error-6"><?php if (isset($message)){ ?><span class="error-form" ><?= $message?></span><br><?php }?></div>
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
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src)
    }
  };
</script>