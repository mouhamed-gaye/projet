<?php
$erreur="";

if(isset($_POST['btn-form'])){
    if($_POST['login']!='' && $_POST['password']!=''){
        $login=$_POST['login'];
        $password=$_POST['password'];
        $result=connexion($login,$password);
        if($result=="error"){
            $erreur="<center>Login ou Password incorrect</center>";
        }else{
            header("location:index.php?lien=".$result);
        }
    }
        
}
?>
<div class="contener">
    <div class="contener-header">
        <div class="title">Login Form</div>
    </div>
    <div class="contener-body">
        <form action="" method="POST" id="form-connexion">
            <div class="input-form">
                <div class="icon-form" icon-form-login></div>
                <input type="text" class="form-control"  error="error-1" name="login" value="<?php if(isset($login)){ echo $login;} ?>" placeholder="login">
                <div class="error-form" id="error-1"></div>
            </div>
            <div class="input-form" >
                <div class="icon-form" icon-form-pwd></div>
                <input type="password" class="form-control" error="error-2" name="password" value="<?php if(isset($password)){ echo $password;} ?>" placeholder="password">
                <div class="error-form" id="error-2"></div>
            </div>
            <div class="input-form">
            <?php if (isset($erreur)){ ?><span class="error-form" ><?= $erreur?></span><?php }?>
            <button type="submit" class="btn-form" name="btn-form">Connexion</button>
            <a href="index.php?lien=player" class="link-form">S'inscrire pour Jouer?</a>
            </div>
        </form>
    </div>
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