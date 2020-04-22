<?php
$users=getData();
foreach ($users as $key => $user) {
    if($user['role']=="joueur"){
        $player[]=$user;
    }
}
$colone=array_column($player,'score');
array_multisort($colone,SORT_DESC,$player);
echo "<table class='table'>";
                foreach ($player as $key => $value) {
                    if($key<5){
                        echo "<tr class='tr'>";
                        echo "<td class='td'>".$value['prenom']."</td><td class='td'>".$value['nom']."</td><td class='td'>".$value['score']."</td>";
                        echo "</tr>";
                    }
                }
                echo "</table>";


?>