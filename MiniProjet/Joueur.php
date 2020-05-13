<?php
is_connect();
$user=$_SESSION['user'];

?>
    <div class="principale-joueur">
        <div class="joueur-header">
            <div class="deconnexion-joueur"><a href="index.php?statut=logout"><button class="btn-deconnexion-joueur">Déconnexion</button></a></div>
            <div class="header-texte-joueur">BIENVENUE SUR LA PLATEFORME DE QUIIZ <br>JOUER ET TESTER VOTRE NIVEAU DE CULTURE GENERALE</div>
            <div class="profil-active">
                <div class="profil-active-joueur">
                    <img class="cadre-profil-joueur" src="<?='uploads/'.$user['avatar']?>" alt="">
                </div>
                <div class="name-joueur"><?=ucwords($user['prenom'])."&nbsp&nbsp".strtoupper($user['nom'])?></div>
            </div>
        </div>
        <div class="container-joueur">
            <div class="container-second-joueur">
                <div class="cote-droite">
                    <div class="score">
                        <div class="blog-score">
                            <a href="index.php?lien=jeux&top=topscore">
                            <div class="top-score">Top Scores</div>
                            </a>
                            <a href="index.php?lien=jeux&top=topscore1">
                            <div class="best-score">Mon meilleur score</div>
                            </a>
                        </div>
                        <div class="five-score">
                        <?php
                            if(isset($_GET['top'])){
                                if($_GET['top']=="topscore"){
                                    include("topscore.php");
                                }elseif($_GET['top']=="topscore1"){
                                    include("meilleurscore.php");
                                }
                            }



                            ?>



                        </div>
                    </div>
                </div>
                <div class="cote-gauche">
                    <div class="cote-gauche-prime">
                    <form action="" method="POST">
                <?php
                $question=file_get_contents("questions.json");
                $question=json_decode($question,true);
                //je veux voir ici le contenu et la structure du fichier json
                //Maintenant j'essai de parcourir ce tableau et recupere chaque partie
                foreach($question as $key1 => $value1){
                    //Je mets Rec pour dire recuperer
                    $question_Rec[]=$question[$key1]['question'];
                    $nbrepoints_Rec[]=$question[$key1]['nbrepoints'];
                    $type_reponse_Rec[]=$question[$key1]['type-reponse'];
                    $reponse_possible_Rec[]=$question[$key1]['reponse_possible'];
                    $bonne_reponse_Rec[]=$question[$key1]['bonne_reponse'];
                }
        
                $nbreq=file_get_contents("nbre-question-page.json");
                $nbreq=json_decode($nbreq,true); 
                if (isset($_SESSION['page'])) {
                    $_SESSION['page']>=1 && $_SESSION['page']<=$nbreq;
                    if(isset($_POST['previeuw'])){
                        $_SESSION['page']--; 
                    }
                }else{
                    $pageActuelle=1;
                    $_SESSION['page']=$pageActuelle;   
                }
                                
                define("NombreValeurParPage",1);
                 $NbrePages=$nbreq;
                if(isset($_SESSION['page'])){
                    $pageActuelle=$_SESSION['page'];
                    if($pageActuelle>$NbrePages){
                        $pageActuelle=$NbrePages;
                    }
                }
                $IndiceDepart=($pageActuelle-1)*NombreValeurParPage;
                $IndiceFin=$IndiceDepart+NombreValeurParPage-1;
                foreach ($question as $key => $value){//debut validité $key
                    if($key>=$IndiceDepart && $key<=$IndiceFin){
                        echo '<div class="show-question">';
                        echo'<div class="readonly">';
                        echo '<p class="readonly-p">Question '.$pageActuelle.'/'. $nbreq.'</p>';
                        echo ' '. $value['question'];
                        echo'</div>';
                        echo'</div>';
                        echo'
                        <div class="show-point">
                        <input value="'.$value['nbrepoints']."pts".'" class="display-point" readonly="readonly" type="text">
                        </div>
                                ';
                    
                        if($value['type-reponse']=="multiple"){
                            echo '<div class="show-answer">';
                            for ($i=0; $i <count($value['reponse_possible']) ; $i++) {
                                
                              echo'<input class="affichage-question" value="'.$reponse_possible_Rec[$key][$i].'" name="ReponsesJoueur'.$i.'" type="checkbox" >'. $value['reponse_possible'][$i].'<br>';
                            }
                            echo '</div>';
                        }elseif ($value['type-reponse']=="simple") {
                            echo '<div class="show-answer">';
                            for ($i=0; $i <count($value['reponse_possible']) ; $i++) {
                                //maintenant ici dc olieu de $i ns allons recuperer la valeur de celui coché
                                echo'<input class="affichage-question" value="'.$reponse_possible_Rec[$key][$i].'"  name="ReponsesJoueur'.$i.'" type="radio">'. $value['reponse_possible'][$i].'<br>'; 
                            }
                            echo '</div>';
                        }elseif ($value['type-reponse']=="texte") {
                            
                            for ($i=0; $i <count($value['reponse_possible']) ; $i++) {
                                echo'  
                                <div class="show-answer">
                                <input value="" name="ReponsesJoueur'.$i.'" class="show-answer-texte" type="text">
                                </div>';
                                
                            }
                        }
                    }
                    
                }
                
            
                ?>
                

                    
                        </div>

                        <div class="boutons-naviguer">
                        <?php if($pageActuelle>1){ ?>
                        <button name="previeuw" class="bouton-naviguer-precedent">Précedent</button>
                        <?php } ?>
                        <?php if($pageActuelle<$NbrePages){ ?>
                        <button type="submit" name="next" class="bouton-naviguer-suivant">Suivant</button>
                        <?php } ?>
                        <?php if($pageActuelle==$NbrePages){ ?>
                        <button type="submit" name="finish" class="bouton-naviguer-suivant">Terminé</button>
                        <?php } ?>
                        </div>
                    </form>
                
                </div>
            </div>
        </div>
    </div>
    <?php
    $reponse=[];
    $_SESSION['total_recup']=[];
    $_SESSION['reponse recuprer']=[];
    //Je voudrai afficher les reponses avant de faire next mais g pas le choix
    if(isset($_POST['next'])){
        $nbrerep=0;
        for ($i=0; $i <count($value['reponse_possible']); $i++) { 
            if(isset($_POST['ReponsesJoueur'.$i]) && !empty($_POST['ReponsesJoueur'.$i])){
                $reponse[]=$_POST['ReponsesJoueur'.$i];
            }
        }
        if(empty($reponse)){

            $_SESSION['reponse recuprer']['question']=$question_Rec[$pageActuelle-1];
            $_SESSION['reponse recuprer']['nbrepoints']=$nbrepoints_Rec[$pageActuelle-1];
            $_SESSION['reponse recuprer']['score']="fausser";
            $_SESSION['reponse recuprer']['reponse_choix']=$reponse;
            $_SESSION['reponse recuprer']['reponse_possible']=$reponse_possible_Rec[$pageActuelle-1];
            $_SESSION['total_recup'][]=$_SESSION['reponse recuprer'];
        }else{
            for ($i=0; $i <count($reponse) ; $i++) { 
                if(in_array($reponse[$i],$bonne_reponse_Rec[$pageActuelle-1])){
                    $nbrerep=$nbrerep+1;  
                }
            }
            if($nbrerep==count($bonne_reponse_Rec[$pageActuelle-1])){
                $_SESSION['reponse recuprer']['question']=$question_Rec[$pageActuelle-1];
                $_SESSION['reponse recuprer']['nbrepoints']=$nbrepoints_Rec[$pageActuelle-1];
                $_SESSION['reponse recuprer']['score']="trouver";
                $_SESSION['reponse recuprer']['reponse_choix']=$reponse;
                $_SESSION['reponse recuprer']['reponse_possible']=$reponse_possible_Rec[$pageActuelle-1];
                $_SESSION['total_recup'][]=$_SESSION['reponse recuprer'];
            }else{
                $_SESSION['reponse recuprer']['question']=$question_Rec[$pageActuelle-1];
                $_SESSION['reponse recuprer']['nbrepoints']=$nbrepoints_Rec[$pageActuelle-1];
                $_SESSION['reponse recuprer']['score']="fausser";
                $_SESSION['reponse recuprer']['reponse_choix']=$reponse;
                $_SESSION['reponse recuprer']['reponse_possible']=$reponse_possible_Rec[$pageActuelle-1];
                $_SESSION['total_recup'][]=$_SESSION['reponse recuprer'];
            }
        }
             
        $_SESSION['page']++; 
    }
    if(isset($_POST['finish'])){
        $nbrerep=0;
        for ($i=0; $i <count($value['reponse_possible']); $i++) { 
            if(isset($_POST['ReponsesJoueur'.$i]) && !empty($_POST['ReponsesJoueur'.$i])){
                $reponse[]=$_POST['ReponsesJoueur'.$i];
            }
        }
        if(empty($reponse)){

            $_SESSION['reponse recuprer']['question']=$question_Rec[$pageActuelle-1];
            $_SESSION['reponse recuprer']['nbrepoints']=$nbrepoints_Rec[$pageActuelle-1];
            $_SESSION['reponse recuprer']['score']="fausser";
            $_SESSION['reponse recuprer']['reponse_choix']=$reponse;
            $_SESSION['reponse recuprer']['reponse_possible']=$reponse_possible_Rec[$pageActuelle-1];
            $_SESSION['total_recup'][]=$_SESSION['reponse recuprer'];
        }else{
            for ($i=0; $i <count($reponse) ; $i++) { 
                if(in_array($reponse[$i],$bonne_reponse_Rec[$pageActuelle-1])){
                    $nbrerep=$nbrerep+1;  
                }
            }
            if($nbrerep==count($bonne_reponse_Rec[$pageActuelle-1])){
                $_SESSION['reponse recuprer']['question']=$question_Rec[$pageActuelle-1];
                $_SESSION['reponse recuprer']['nbrepoints']=$nbrepoints_Rec[$pageActuelle-1];
                $_SESSION['reponse recuprer']['score']="trouver";
                $_SESSION['reponse recuprer']['reponse_choix']=$reponse;
                $_SESSION['reponse recuprer']['reponse_possible']=$reponse_possible_Rec[$pageActuelle-1];
                $_SESSION['total_recup'][]=$_SESSION['reponse recuprer'];
            }else{
                $_SESSION['reponse recuprer']['question']=$question_Rec[$pageActuelle-1];
                $_SESSION['reponse recuprer']['nbrepoints']=$nbrepoints_Rec[$pageActuelle-1];
                $_SESSION['reponse recuprer']['score']="fausser";
                $_SESSION['reponse recuprer']['reponse_choix']=$reponse;
                $_SESSION['reponse recuprer']['reponse_possible']=$reponse_possible_Rec[$pageActuelle-1];
                $_SESSION['total_recup'][]=$_SESSION['reponse recuprer'];
            }
        }
    }
    ?>