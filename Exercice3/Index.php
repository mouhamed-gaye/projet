<?php

require_once"functions.php";
$nbrchamps=0;
$message="";
    $tabMots =[];
    $errors=[];
    $motsAvecM =[];
if(isset($_POST['valider'])){
    if(!is_empty($_POST['nbre'])){
        $nbrchamps=$_POST['nbre'];
        if(chaine_numeric($nbrchamps) && $nbrchamps>0){
         
        }else{
            $message="Veuillez saisir un entier svp !";
            $nbrchamps=0; 
        }   
    }else{
        $message="Champs obligatoire !";
    }   
}
if (isset($_POST['Resultat'])){
    
    $nbrchamps =$_POST['nbre'];
    for ($i=0;$i<$nbrchamps;$i++){
        $mot= $_POST['mot_'.($i)];
        $mot=delete_spc_before_after($mot);
        if(is_empty($mot)){
            $errors[$i]="Saisir un mot svp";   
        }
        if(longueur_chaine($mot)>20){
            $errors[$i] = "Le mot ne doit pas depasser 20 caractères !";
        }
        if(!is_chaine_alpha($mot)) {
            $errors[$i] = "Des lettres uniquement !";
        }
        if(is_here(" ",$mot)){
            $errors[$i]="Un Seul mot svp !";
        }
        $tabMots[]=$mot;
        
    
         
    }
    if(is_empty($errors)){
        $m=['m','M'];
        $R="";
        for ($i=0; $i <longueur_chaine($tabMots); $i++) { 
            if(is_here("m",$tabMots[$i])){
              $motsAvecM[]= $tabMots[$i]; 
            }
        }
        $R=" Vous avez saisi &nbsp".$nbrchamps."&nbsp dont &nbsp".longueur($motsAvecM)."&nbsp avec la lettre M !";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="exo3.css">
    <script src="main.js"></script>
</head>
<body>
<form action="index.php" method="POST">
    <div class="contener">
<fieldset>
    <legend>Mots</legend>
        <div class="first">
            <label class="labs" for="nbre">
                Combien de mots?
            </label><br>
            <input type="text" name="nbre" id="nbre" value="<?php if($nbrchamps>0){ echo $nbrchamps;} ?>"><br>
            <p style="color:red"><?= $message ?>
        </div> 
        <div  class="second">
            <button type="submit" name="valider" class="valider">Valider</button>
            <button type="submit" name="Annuler" class="annuler">Annuler</button>
            <br><br>
        </div>
</fieldset>
        <div class="third">
            <?php for ($i=0;$i<$nbrchamps;$i++){ ?>
                <label class="labs1" for="nbre">Mot N°<?= $i+1?></label>
                <?php if (isset($errors[$i])){ ?>
                <span style="color:red;" ><?= $errors[$i]?></span><br>
                <?php }?>
                <input type="text" name="mot_<?=$i?>" autocomplete="off" class="mot"  value="<?php if (isset($_POST['mot_'.($i)])){echo $_POST['mot_'.($i)];}?>" ><br><br>
            <?php } ?>
            <?php if ($nbrchamps>0){ ?>
            <button type="submit" name="Resultat" class="Resultat">Résultat</button><br><br><br><br>
            <?php } ?>
        </div>
        <div class="forth">
            <?php if (empty($errors)){ ?>
                <p class="lettre" style="color:white;" ><?php if (isset($R)){echo $R;}?></p>
            <?php } ?>
        </div>
</form>
</body>
</html>