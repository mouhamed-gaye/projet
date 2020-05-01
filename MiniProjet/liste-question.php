<div class="page-liste-question">
    <div class="titre-liste-question">
        <input type="text" class="numero-page-question">
       <p class="titre-du-page"> Nombre De Questions Par Jeu</p>  
    </div>
    <div class="question-par-page">
        <?php
        $question=file_get_contents("questions.json");
        $question=json_decode($question,true);
        define("NombreValeurParPage",5);
                if(isset($question)){
                    $TotalValeur=count($question);
                }else{
                    $TotalValeur=0;
                }
                $NbrePages=ceil($TotalValeur/NombreValeurParPage);
                if(isset($_GET['page'])){
                    $pageActuelle=$_GET['page'];
                    if($pageActuelle>$NbrePages){
                        $pageActuelle=$NbrePages;
                    }
                }else{
                    $pageActuelle=1;
                }
                $IndiceDepart=($pageActuelle-1)*NombreValeurParPage;
                $IndiceFin=$IndiceDepart+NombreValeurParPage-1;
        
        foreach ($question as $key => $value) {
            if($key>=$IndiceDepart && $key<=$IndiceFin){
                echo $value['question']."<br>";
                if($value['type-reponse']=="multiple"){
                    for ($i=0; $i <count($value['reponse_possible']) ; $i++) { 
                        if(in_array($value['reponse_possible'][$i],$value['bonne_reponse'])){
                            echo"<input class=\"affichage-question\" type=\"checkbox\" checked >". $value['reponse_possible'][$i]."<br>";
                        }else{
                            echo"<input class=\"affichage-question\" type=\"checkbox\" >". $value['reponse_possible'][$i]."<br>";
                        }
                    }
                }elseif ($value['type-reponse']=="simple") {
                    for ($i=0; $i <count($value['reponse_possible']) ; $i++) { 
                        if(in_array($value['reponse_possible'][$i],$value['bonne_reponse'])){
                            echo"<input class=\"affichage-question\" type=\"radio\" checked>". $value['reponse_possible'][$i]."<br>";
                        }else{
                            echo"<input class=\"affichage-question\" type=\"radio\">". $value['reponse_possible'][$i]."<br>";
                        }
                    }
                }elseif ($value['type-reponse']=="texte") {
                    for ($i=0; $i <count($value['bonne_reponse']) ; $i++) { 
                        echo"<input value=\"{$value['bonne_reponse'][$i]}\" class=\"affichage-question-input\" readonly=\"readonly\" type=\"text\">"."<br>";
                    }
                }
            }
            
        }
        
        ?>
    </div>
    <div class="buton-pagination-question">
    <?php
                if($pageActuelle>1){
                    echo '<a href="index.php?lien=accueil&block=liste-question&page='.($pageActuelle-1).'"><button class="precedent-question">Précedent</button></a>';   
                }
                if($NbrePages>$pageActuelle){
                    echo '<a href="index.php?lien=accueil&block=liste-question&page='.($pageActuelle+1).'"><button class="suivant-question">Suivant</button></a>';   
                }
                ?>
    </div>
</div>