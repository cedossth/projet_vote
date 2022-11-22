<?php
    require_once('identifier.php');
    require_once("../api/db_connect.php");

?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Accueil</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
        <style>
            .contenu{
                position: relative;
                display: flex;
                background-color: black;
                height:100vh;
                color: white;
            }
            .contenu::before{
                content: "";
                position: absolute;
                opacity: 0.2;
                background-image:url('../VoteParInternet.webp');
                background-size:cover;
                width:100%;
                height:100vh;
                background-position:center;
                background-repeat:no-repeat;
                background-attachment: fixed;
            }
        </style>
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <br><br>
        <div>
                <header>
                    <h2> BIENVENUE SUR VOTRE SITE DE VOTE </h2>
                </header>
                <?php if ($_SESSION['user']['est_inscrit']==0) {?>
                <p><mark>Avant toute chose, nous vous prions de cliquer sur ce <a href="editerBureau.php">bouton</a> afin de vous inscrire dans un bureau de vote</mark></p>
                <?php }?>
            <div class="contenu">
                <div style="float : left ;
                    width : 100px ;
                    opacity:0.7;
                    ">
                    <img src="../sen.png" alt=""/>
                </div>
                <section style="margin-left : 300px;">
                    
                    <article>
                        <h1> Élections législatives sénégalaises de 2022 </h1 >
                        <p>
                        

Les élections législatives sénégalaises de 2022 se déroulent le 31 juillet 2022 afin de renouveler pour cinq (5) ans les cent soixante-cinq (165) membres de l'assemblée nationale du Sénégal. La répartition de ces membres se fera selon un mode de scrutin parallèle dans cinquante-quatre (54) circonscriptions électorales reparties ainsi qu’il suit : quarante-six (46) départements du Sénégal et huit (8) circonscriptions de la diaspora. 

Cent douze (112) sièges sont pourvus au scrutin de liste majoritaire à raison d'un à sept sièges par circonscription, selon leur population. Les circonscriptions de la diaspora comportent entre un et trois sièges, pour un total fixé à quinze (15) sièges. 

Les cinquante-trois (53) sièges restants sont pourvus au scrutin proportionnel plurinominal sur la base du total des voix des partis additionnés au niveau national.

Les deux systèmes sont indépendants. Chaque parti obtient une part des sièges pourvus à la proportionnelle correspondant à sa part des suffrages, auxquels s'ajoutent les quatre-vingt-dix (90) sièges obtenus dans les circonscriptions à la majorité relative, donnant au scrutin une tendance majoritaire. La répartition des sièges se fait selon le système du quotient simple. 

Les listes de candidats et de suppléants doivent obligatoirement alterner les candidats de l'un ou l'autre sexe conformément à la loi sur la parité votée en 2010. Dans le cas où un seul siège est à pourvoir dans la circonscription, le titulaire et le suppléant sont obligatoirement de sexes différents. 
                        </p>
                    </article>
                </section>
            </div>
        </div>
    </body>
</HTML>