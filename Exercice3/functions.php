<?php
function longueur($chaine){
	if (isset($chaine)){
		$i=0;
		for($j=0; isset($chaine[$i]); $j++) {
			$i++;
		}
	return $i;
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
#fonction qui verifie si un caractère alphabétique est en minuscule
function is_minuscule($lettre){
    $minuscules = "azertyuiopqsdfghjklwxcvbnm";
    for($i=0;$i<26;$i++){
        if($minuscules[$i]==$lettre){
            return true;
        }
    }
    return false;
}

#fonction qui verifie si on a un caractère alphabétique sans tenir compte de la casse
function is_car_alpha($car){
    if((($car >= 'a' &&  $car <= 'z') || ($car >= 'A' &&  $car <= 'Z')) && longueur_chaine($car)==1){
    return true;
}
return false;
}

#fonction qui convetit un caractère alphabétique en minuscule
function car_minuscule($car){
    $minuscules = "a";
    $majuscules = "A";
    for($i=0;$i<26;$i++){
        if($majuscules==$car){
            return $minuscules;   
        }
        $minuscules++;
        $majuscules++;
    }
}


#fonction qui convetit un caractère alphabétique en majuscule
function car_majuscule($car){
    $minuscules = "a";
    $majuscules = "A";
    for($i=0;$i<26;$i++){
        if($minuscules==$car){
            return $majuscules;   
        }
        $minuscules++;
        $majuscules++;
    }
}


#fonction qui convetit une chaine de caractère alphabétique en minuscule
function chaine_minuscule($car){
    $tab="";
    $j=0;
    while(isset($car[$j])){
        $tab.=car_minuscule($car[$j]);
        $j++;
    }
return $tab;
}



function est_minuscule($car){
    return ($car>="a" && $car<="z");
    }


#fonction qui convetit une chaine de caractère alphabétique en majuscule
function chaine_majuscule($car){
        $tab="";
        for ($i=0; $i <longueur($car) ; $i++) { 
            $tab.=car_majuscule($car[$i]);
        }  
    return $tab;       
}

#fonction qui vérifie si on a un mot ou pas
function is_chaine_alpha($car){
    for ($i=0; $i <longueur($car) ; $i++){
      if(!is_car_alpha($car[$i])){
        return false;
      } 
    }
    return true;
}

#fonction qui verifie si on a un caractère numérique
function is_car_numeric($car){
   if($car>='0'&& $car<='9'){
    return true;
   }
   return false;
}

#fonction qui vérifie si on a un nombre entier
function chaine_numeric($car){
    for ($i=0; $i <longueur($car) ; $i++){
        if(!is_car_numeric($car[$i])){
          return false;
        } 
      }
      return true; 
}

#fonction qui vérifie si un caractère recherché existe dans une chaine
function is_here($m,$car){
    for ($i=0; $i <longueur($car) ; $i++){
      if($m==$car[$i] || inverse_car($m)==$car[$i]){
        return true;
      } 
    }
    return false;
}

#fonction qui inverse la casse d'un caractère alphabétique 
#et retourne un caractère s'il n'est pas alphabétique
function inverse_car($car){
    $minuscules = "a";
    $majuscules = "A";
    for($i=0;$i<26;$i++){
        if($minuscules==$car){
            return $majuscules;   
        }elseif($majuscules==$car){
            return $minuscules;
        }
        $minuscules++;
        $majuscules++;
    }
    return $car;       
}

#fonction qui inverse la casse d'un caractère alphabétique 
#et retourne un caractère s'il n'est pas alphabétique
#(version2)
function inverse_caratère($car){
    if(is_car_alpha($car)){
        if($car>='a' && $car<='z'){
            return car_majuscule($car);
        }elseif ($car>='A' && $car<='Z') {
            return car_minuscule($car);
        }
    }else{
        return $car;
    }
        
}

#fontion qui verifie si un chaine est vide ou pas
function is_empty($chaine){
    if(longueur($chaine)==0){
        return true;
    }else{
        return false;
    }
}


function delete_spc_before_after($chaine){
    $debut=0;
    $fin=longueur($chaine)-1;
    $newChaine ="";
    if($chaine==''){ 
        return $chaine; 
    }
    while ($chaine[$debut]==' '){
        $debut++;
        if(!isset($chaine[$debut])){
            return '';
        } 
    } 
    while ($chaine[$fin]==' '){ 
        $fin--; 
    }
    for ($i=$debut; $i <=$fin ; $i++) { 
        $newChaine.=$chaine[$i];
    }
    
    return $newChaine;

}


?>