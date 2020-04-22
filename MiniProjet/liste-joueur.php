<?php
$users=getData();
foreach ($users as $key => $user) {
    if($user['role']=="joueur"){
        $player[]=$user;
    }
}
$colone=array_column($player,'score');
array_multisort($colone,SORT_DESC,$player);


?>
<div class="liste-joueur-joueur">
    <div class="header-liste-joueur">LISTE DES JOUEURS PAR SCORE</div>
    <div class="partie-liste-joueur">
        <div class="info-liste-joueur">
            <div class="info">
                <div class="prenom-score">Prénom</div>
                <div class="nom-score">Nom</div>
                <div class="score-score">Score</div>
            </div>
            <div class="lister-joueur-order">
                <?php
                define("NombreValeurParPage",10);
                if(isset($player)){    #si ca existe
                    $TotalValeur=count($player);
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
                echo "<table class='table'>";
                foreach ($player as $key => $value) {
                    if($key>=$IndiceDepart && $key<=$IndiceFin){
                        echo "<tr class='tr'>";
                        echo "<td class='td'>".$value['prenom']."</td><td class='td'>".$value['nom']."</td><td class='td'>".$value['score']."</td>";
                        echo "</tr>";
                    }
                }
                echo "</table>";
                for ($page=1; $page<=$NbrePages ; $page++) { 
                    echo '<a href="index.php?page=liste-joueur&'.$page.'">['.$page.']</a>&nbsp&nbsp';
                }
                
                ?>
            </div>
        </div>
    </div>
</div>