<?php
#fonction qui vérifie si un caractère recherché existe dans une chaine
function is_here($m,$car){
    for ($i=0; $i <longueur($car) ; $i++){
      if($m==$car[$i]){
        return true;
      } 
    }
    return false;
}

#fontion qui verifie si un chaine est vide ou pas
function is_empty($chaine){
    if(longueur_chaine($chaine)==0){
        return true;
    }else{
        return false;
    }
}
#fontion qui renvoie la longueur d'une chaine de caractère
function longueur_chaine($chaine){
    $i=0;
    while(isset($chaine[$i])){
        $i++;
    }
    return $i;
}

##fonction qui vérifie si on a une phrase
function is_phrase($chaine){
    if(preg_match("#^[A-Z]{1}.+[(\.)(\!)(\?)]$#",$chaine)){
        return true;
    }else{
        return false;
    }
}
#fonction qui convetit un caractère alphabétique en majuscule
function car_majuscule($car){
    $minus = "a";
    $majus= "A";
    for($i=0;$i<26;$i++){
        if($minus==$car){
            $car= $majus;   
        }elseif($majus==$car){
            return $car;
        }
        $minus++;
        $majus++;
    }
    return $car;
}
#fonction qui verifie si on a un caractère alphabétique sans tenir compte de la casse
function is_car_alpha($car){
    if((($car >= 'a' &&  $car <= 'z') || ($car >= 'A' &&  $car <= 'Z')) && longueur_chaine($car)==1){
    return true;
}
return false;
}


#fonction qui convertir en majuscule le premeir caractere d'une chaine
function Maj_first($chaine){
    if(isset($chaine[0])){
        if(is_car_alpha($chaine[0])){
            $chaine[0]=car_majuscule($chaine[0]);
        }
    }
    return $chaine;
}


#fontion qui un ajoute un point si la phrase n'est pas pontuée
function Add_point($chaine){
    $l=longueur_chaine($chaine)-1;
    if(isset($chaine[$l])){
        if($chaine[$l]=="." || $chaine[$l]=="!"|| $chaine[$l]=="?"){
            return $chaine;
        }
    }
    return $chaine.".";
}
#fonction recupère les phrases dans un texte
function recup_phrase($texte){
    preg_match_all("#[^.!?]*[(\.)|(\!)|(\?)]#",$texte,$phrase);
    return $phrase;
}


#fonction qui découpe un texte en phrases
function decoupe_texte($texte){
    $phrase=preg_split("/(?<=[.?!])\s*(?=[a-z])/i",$texte);
    return $phrase;
}
#fonction qui supprime les espaces inutile dans une phrase
function delete_espace($phrase){
    $phrase=preg_replace("%[\s+]%"," ",$phrase);
    $phrase=preg_replace("%\s+\.%",".",$phrase);
    $phrase=preg_replace("%\s*'\s*%","'",$phrase);
    $phrase=preg_replace("%\s*\,\s*%",", ",$phrase);
    $phrase=preg_replace("%\s*\?%"," ?",$phrase);
    $phrase=preg_replace("%\s*\!%","!",$phrase);
    $phrase=preg_replace("%\s*\;\s*%","; ",$phrase);
    $phrase=trim($phrase);
    return $phrase;
}
?>