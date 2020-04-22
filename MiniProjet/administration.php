<?php
is_connect();
$user=$_SESSION['user'];
?>
<div class="principale">
    <div class="principale-cover">
    <div class="admin-header">
        <div class="header-texte">CREER ET PARAMETRER VOS QUIIZ</div>
        <div class="bouton"><a href="index.php?statut=logout"><button class="btn-deconnexion">Déconnexion</button></a></div>
    </div>

        <div class="container">
            <div class="gauche">
            <div class="gauche-container">
                <div class="gauche-second">
                    <div class="entete">
                        <div class="photo"> 
                            <img  class="cadre" src="<?='uploads/'.$user['avatar']?>" alt="">
                        </div>
                        <div class="nom-prenom"><?=ucwords($user['prenom'])."<br>"."&nbsp&nbsp&nbsp&nbsp".strtoupper($user['nom'])?></div>
                    </div>
                    <div class="partie-basse">
                        <a href="#">
                        <div class="liste-question">
                            <div class="logo-liste-question"></div>
                            <div class="label-texte"><div class="texte">Liste Questions</div></div>
                        </div>
                        </a>
                        <a href="index.php?lien=accueil&block=inscription">
                        <div class="creer-admin">
                            <div class="logo-creer-admin"></div>
                            <div class="label-texte"><div class="texte"> Créer Admin</div></div>
                        </div>
                        </a>
                        <a href="index.php?lien=accueil&block=liste-joueur">
                            <div class="liste-joueur">
                            <div class="logo-liste-joueur"></div>
                            <div class="label-texte"><div class="texte"> Liste Joueurs</div></div>
                        </div>
                        </a>
                        <a href="#">
                        <div class="creer-question">
                            <div class="logo-creer-question"></div>
                            <div class="label-texte"> <div class="texte">Créer Questions</div></div>
                        </div>
                        </a>
                    </div>

                </div>
                
            </div>
            </div>
            <div class="droite">
        <?php
        if(isset($_GET['block'])){
            if($_GET['block']=="inscription"){
                include("inscription.php");
            }elseif ($_GET['block']=="liste-joueur") {
                include("liste-joueur.php");
                
            }
        }


        ?>





            </div>
        </div>
    </div>
</div>