
<?php

$reponse_possible=array();
$bonne_reponse=array();

if(isset($_POST['enregistrer'])){
    if($_POST['question']!='' && $_POST['nbrepoints']!=''&& $_POST['type-reponse']!=''){
        $question=$_POST['question'];
        $nbrepoints=$_POST['nbrepoints'];
        $type_reponse=$_POST['type-reponse'];
        $nbr=0;
        if($type_reponse==="multiple"){
            $i=1;
            while(isset($_POST['reponse'.$i]) && !empty($_POST['reponse'.$i])){
                
                $reponse_possible[]=$_POST['reponse'.$i];
                
                if(!empty($_POST['checkbox'.$i])){
                    $bonne_reponse[]=$_POST['reponse'.$i];
                }
                $i++;
            }
            $creer_question=array();
            $creer_question['question']=$question;
            $creer_question['nbrepoints']=$nbrepoints;
            $creer_question['type-reponse']=$type_reponse;
            $creer_question['reponse_possible']=$reponse_possible;
            $creer_question['bonne_reponse']=$bonne_reponse;
            $js=file_get_contents("questions.json");
            $js=json_decode($js,true);
            $js[]=$creer_question;
            $js=json_encode($js);
            file_put_contents("questions.json",$js);
        }elseif ($type_reponse=="simple") {
            $i=1;
            while(isset($_POST['reponse'.$i]) && !empty($_POST['reponse'.$i])){
                $reponse_possible[]=$_POST['reponse'.$i];
                if(!empty($_POST['radio'.$i])){
                    $bonne_reponse=$_POST['reponse'.$i];
                }
                $i++;
            }
            $creer_question=array();
            $creer_question['question']=$question;
            $creer_question['nbrepoints']=$nbrepoints;
            $creer_question['type-reponse']=$type_reponse;
            $creer_question['reponse_possible']=$reponse_possible;
            $creer_question['bonne_reponse']=$bonne_reponse;
            $js=file_get_contents("questions.json");
            $js=json_decode($js,true);
            $js[]=$creer_question;
            $js=json_encode($js);
            file_put_contents("questions.json",$js);
        }elseif($type_reponse=="texte"){
            $i=1;
            while(isset($_POST['reponse'.$i]) && !empty($_POST['reponse'.$i])){
                $reponse_possible="";
                $bonne_reponse=$_POST['reponse'.$i];

                $i++;
            }
            $creer_question=array();
            $creer_question['question']=$question;
            $creer_question['nbrepoints']=$nbrepoints;
            $creer_question['type-reponse']=$type_reponse;
            $creer_question['reponse_possible']=$reponse_possible;
            $creer_question['bonne_reponse']=$bonne_reponse;
            $js=file_get_contents("questions.json");
            $js=json_decode($js,true);
            $js[]=$creer_question;
            $js=json_encode($js);
            file_put_contents("questions.json",$js);  
        }
       
        
    }
 
}




?>
<div class="creation-question">
    <div class="title-creation-question">PARAMETRER VOTRE QUESTION</div>
    <div class="partie-creation-question">
        <div class="partie-creation-question-second">
            <form action="" method="POST" id="form-question">
                <div class="partie-saisie-question">
                  <label class="lbl-question" for="">Questions</label>
                  <textarea class="textearea input" name="question" error="error-1"  cols="70" rows="8" value=""></textarea>
                </div>
                <div class="error-question" id="error-1"></div>
                <div class="partie-nbre-point">
                    <label for="" class="lbl-nbre-point">Nombre de Points</label>
                    <input type="number"  error="error-2" class="input-number input" name="nbrepoints" value="" min="1" max="5">
                </div>
                <div class="error-question" id="error-2"></div>
                <div id="inputs" class="partie-reponse">
                    <div class="partie-type-reponse" id="partie_0" >
                        <label for="" class="lbl-type-reponse">Type de Réponse</label>
                        <select class="section-reponse input" onchange="enlever()" name="type-reponse" id="section-reponse">
                            <option value="">Choisir un type de réponse</option>
                            <option value="multiple">Choix Multiples</option>
                            <option value="simple">Sipmle</option>
                            <option value="texte">Texte</option>
                        </select>
                        <button type="button" id="ajouter-champs" onclick="ajouter()" class="ajouter-champs"></button>
                    </div>
                    <div id="inputs2"></div>


                </div>
                <div class="bouton-submit">
                <button type="submit" name="enregistrer" class="btn-enregistrer-rep">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

</div>
<script>

   var nbr=0;
   var num=2;
    function ajouter(){
        nbr++;
        num++;
        var divInputs=document.getElementById('inputs2');
        var newInput=document.createElement('div');
        var select=document.getElementById('section-reponse')
        newInput.setAttribute('class','partie-input-reponse')
        newInput.setAttribute('id','partie_'+nbr)
        if(select.value==="multiple"){
                newInput.innerHTML=`
                                <label for="" class="lbl-numero-reponse">Réponse ${nbr}</label>
                                <input type="text"  error="error-${num}" class="input-reponse input"name="reponse${nbr}" value="">
                                <input type="checkbox" name="checkbox${nbr}"class="checkbox-reponse">
                                <button type="button" onclick="suprimer(${nbr})" class="suprimer-question"></button><br>
                                <div class="error-question" id="error-${num}"></div><br><br>
                `;
                divInputs.appendChild(newInput);
        }
        if(select.value==="simple"){
                newInput.innerHTML=`
                                <label for="" class="lbl-numero-reponse">Réponse ${nbr}</label>
                                <input type="text" id="input" error="error-${num}"  class="input-reponse input"name="reponse${nbr}" value="">
                                <input type="radio"  name="radio${nbr}" class="radio-reponse">
                                <button type="button" onclick="suprimer(${nbr})" class="suprimer-question"></button><br>
                                <div class="error-question" id="error-${num}"></div><br><br>
                `;
                divInputs.appendChild(newInput); 
        }
        if(select.value==="texte"){
            
            newInput.innerHTML=`
                                <label for="" class="lbl-numero-reponse">Réponse ${nbr}</label>
                                <input type="text" id="input" error="error-${num}"  class="input-reponse input" name="reponse${nbr}" value="">
                                <button type="button" onclick="suprimer(${nbr})" class="suprimer-question"></button><br>
                                <div class="error-question" id="error-${num}"></div><br><br>
            `;
            divInputs.appendChild(newInput);
            desactiv();
        }


        const inputs=document.getElementsByClassName("input");
            for(input of inputs){
                input.addEventListener("keyup",function(e){
                    if(e.target.hasAttribute("error")) {
                        var idDivError=e.target.getAttribute("error")
                        document.getElementById(idDivError).innerText=""
                    }
                })

            } 
    }
    function desactiv(){
        select=document.getElementById('section-reponse');
        eleman=document.getElementById('ajouter-champs');
        if(select.value==="texte"){
            eleman.setAttribute("disabled",true);
        }
        else{
            eleman.setAttribute("disabled",false);
        }
    }
    function suprimer(n){
        var target=document.getElementById('partie_'+n);
        target.remove();
    }
    function enlever(){
         var divInputs2 = document.getElementById('inputs2');
         divInputs2.innerHTML = ``;
    }

</script>
<script>
    const inputs=document.getElementsByClassName("input");
    for(input of inputs){
        input.addEventListener("keyup",function(e){
        if(e.target.hasAttribute("error")) {
            var idDivError=e.target.getAttribute("error")
            document.getElementById(idDivError).innerText=""
        }
        })

    }

document.getElementById("form-question").addEventListener("submit", function(e){
    const inputs=document.getElementsByClassName("input");
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