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
                <p><mark>Avant toute chose, nous vous prions de cliquer sur ce <a href="editerBureau.php">bouton</a> afin de vous inscrire dans un bureau de vote</mark></p>
            <div class="contenu">
                <div style="float : left ;
                    width : 100px ;
                    opacity:0.7;
                    ">
                    <img src="../sen.png" alt=""/>
                </div>
                <section style="margin-left : 300px;">
                    <aside>
                    <h1>À propos de l'auteur </h1>
                    <p>C'est moi, Zozor! Je suis né un 23 novembre 2005 .</p>
                    </aside>
                    <article>
                        <h1> Je suis un grand voyageur </h1 >
                        <p>Bla bla bla bla (texte de l'article)
                            Il s'agit de la deuxième partie de la série animée Build Divide. L’histoire se déroule dans le New Kyoto, où le seigneur de la ville est élu grâce à un jeu de cartes hors du commun. Nous suivons la lutte de Teruhito Kurabe, et de son protecteur qu’il peut matérialiser, face aux autres utilisateurs....
                            L’histoire met en scène la lutte entre l’équipage de Luffy et le puissant Gild Tesoro, responsable de la plus grande ville de divertissement du monde. Cette ville, mêlant rêve et obscurité insondable, s’avère être également un navire de 10 km. Et elle est reconnue par le Gouvernement Mondial comme une nation indépendante. Mais dans cet havre de paix tout ne serait-il pas qu’illusion ?...
                        </p>
                    </article>
                </section>
            </div>
        </div>
    </body>
</HTML>