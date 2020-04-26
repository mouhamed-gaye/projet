<div class="creation-question">
    <div class="title-creation-question">PARAMETRER VOTRE QUESTION</div>
    <div class="partie-creation-question">
        <div class="partie-creation-question-second">
            <form action="" method="POST">
                <div class="partie-saisie-question">
                  <label class="lbl-question" for="">Questions</label>
                  <textarea class="textearea" name="question" id="" cols="70" rows="8"></textarea>
                </div>
                <div class="partie-nbre-point">
                    <label for="" class="lbl-nbre-point">Nombre de Points</label>
                    <input type="number" class="input-number"name="nbrepoints" min="1" max="5">
                </div>
                <div id="inputs" class="partie-reponse">
                    <div class="partie-type-reponse" id="partie_0" >
                        <label for="" class="lbl-type-reponse">Type de Réponse</label>
                        <select class="section-reponse" name="" id="section-reponse">
                            <option value="">Choisir un type de réponse</option>
                            <option value="multiple">Choix Multiples</option>
                            <option value="simple">Sipmle</option>
                            <option value="texte">Texte</option>
                        </select>
                        <button type="button" onclick="ajouter()" class="ajouter-champs"></button>
                    </div>
                    


                </div>
                <button type="submit" class="btn-enregistrer-rep">Enregistrer</button>

            </form>
        </div>
    </div>

</div>
<script>
   var nbr=0;
    function ajouter(){
        nbr++;
        var divInputs=document.getElementById('inputs');
        var newInput=document.createElement('div');
        var select=document.getElementById('section-reponse')
        newInput.setAttribute('class','partie-input-reponse')
        newInput.setAttribute('id','partie_'+nbr)
        if(select.value==="multiple"){
                if(nbr<=5){

                newInput.innerHTML=`
                                <label for="" class="lbl-numero-reponse">Réponse</label>
                                <input type="text" class="input-reponse"name="reponse">
                                <input type="checkbox" class="checkbox-reponse">
                                <button type="button" onclick="suprimer(${nbr})" class="suprimer-question"></button>
                `;
                divInputs.appendChild(newInput);
                }
        }
        if(select.value==="simple"){
            if(nbr<=5){

                newInput.innerHTML=`
                                <label for="" class="lbl-numero-reponse">Réponse</label>
                                <input type="text" class="input-reponse"name="reponse">
                                <input type="radio" class="radio-reponse">
                                <button type="button" onclick="suprimer(${nbr})" class="suprimer-question"></button>
                `;
                divInputs.appendChild(newInput);
            } 
        }
        if(select.value==="texte"){
            newInput.innerHTML=`
                                <label for="" class="lbl-numero-reponse">Réponse</label>
                                <input type="text" class="input-reponse"name="reponse">
                                <button type="button" onclick="suprimer(${nbr})" class="suprimer-question"></button>
            `;
            divInputs.appendChild(newInput);
        }
        
    }
    function suprimer(n){
        var target=document.getElementById('partie_'+n);
        target.remove();
    }
    
   




</script>