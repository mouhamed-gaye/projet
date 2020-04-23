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
                </div>
            </div>
        </div>
    </div>
