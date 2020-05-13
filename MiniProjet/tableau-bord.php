<?php
$data=getData();
$nbreadmin=0;
$nbreplayer=0;
foreach ($data as $key => $value) {
        if($value['role']=="joueur"){
            $nbreplayer=$nbreplayer+1;
        }elseif($value['role']=="admin"){
            $nbreadmin=$nbreadmin+1;
        }
    
}
$total=count($data);
$prc1=($nbreadmin*100)/$total;
$prc2=($nbreplayer*100)/$total;



?>
<div class="page-tableau-bord">
<script type=text/javascript src=https://www.gstatic.com/charts/loader.js></script> 
<script type=text/javascript> 
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['role', 'number'],
          ['Admin',     1],
          ['Joueur',    23]
        ],false);

        var options = {
          title: 'Representation des Admins et Joueurs',
          is3D:true
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <script type=text/javascript src=https://www.gstatic.com/charts/loader.js></script> 
<script type=text/javascript> 
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Type', 'Number'],
          ['Multiple',      2],
          ['Simple',  2],
          ['Texte',    7]
        ],false);

        var options = {
          title: 'Représentation des types questions',
          is3D:true
        };

        var chart = new google.visualization.PieChart(document.getElementById('mychart'));

        chart.draw(data, options);
      }
    </script>


<div id="piechart" style="width: 100%; height: 325px;">&nbsp;</div>
<div id="mychart" style="width: 100%; height: 325px;"></div>
</div>
