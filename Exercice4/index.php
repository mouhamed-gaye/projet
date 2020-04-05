<?php
require_once"fonction.php";
$phrase="";
$texte="";
if(isset($_POST['resultat'])){
    if(is_empty($_POST['textarea'])){
        $error="Veuillez saisir un texte svp !!!";
    }else{
        $texte=$_POST['textarea'];
        $phrase=decoupe_texte($texte);
        
    
            
    }
}


#var_dump($recup);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="exo4.css">
    <script src="main.js"></script>
</head>
<body>
    <form action="index.php" method="POST">
    <div class="contener">
        <div class="first">
            <label class="labs" for="phrase">
            Entrez votre texte !
            </label><br>
            <textarea name="textarea"  class="textarea" rows="10" cols="70"></textarea><br>
            <?php if (isset($error)){ ?>
                <span style="color:red;" ><?= $error?></span><br><br><br>
                <?php }?>
        </div>
        <div  class="second">
            <button type="submit" name="resultat" class="resultat">Résultat</button>
            <button type="submit" name="annuler" class="annuler">Annuler</button><br><br><br>
        </div>
        <div class="third">
            <?php if(!empty($phrase)){?>
                <textarea readonly="readonly" class="readonly" rows="10" cols="70"><?php
                    for ($i=0; $i <longueur_chaine($phrase) ; $i++) { 
                        $chaine=delete_espace($phrase[$i]);
                        $chaine=Maj_first($chaine);
                        $chaine=Add_point($chaine);
                        if(is_phrase($chaine)){
                            if(longueur_chaine($chaine)<=200){
                                echo $chaine;
                            }
                        }
                    }
                    
                    
                    
                    ?>
                </textarea><br><br><br>
            <?php } ?>
        </div>
    </div>
    </form>   
</body>
</html>