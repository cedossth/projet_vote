<?php
    require_once('identifier.php');
    require_once("../api/db_connect.php");

    $candidat=json_decode(file_get_contents("http://127.0.0.1/api/candidats"));

    $requete="select vote_pour,nom,count(vote_pour)*100 / (select count(idUser) from user where a_vote<>0) as pourcentage from user,candidat where vote_pour<>0 and vote_pour=idUserF group by vote_pour";

    $resultatC=mysqli_query($conn,$requete);
    while($row = mysqli_fetch_array($resultatC, MYSQLI_ASSOC))
    {
      $response[] = $row;
    }
    
    
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
    <title> Nouvel utilisateur </title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <style>
        @import url(https://fonts.googleapis.com/css?family=Ubuntu:400,700);
        * {
          -webkit-box-sizing: border-box;
          -moz-box-sizing: border-box;
          box-sizing: border-box;  
        }
        body {
        	background: #1f253d;
        }

        ul {
        	list-style-type: none;
        	margin: 0;
        	padding-left: 0;
        }

        h1 {
        	font-size: 23px;
        }

        h2 {
        	font-size: 17px;
        }

        p {
        	font-size: 15px;
        }

        a {
        	text-decoration: none;
        	font-size: 15px;
        }
        a:hover {
        	text-decoration: underline;
        }

        h1, h2, p, a, span{
        	color: #fff;
        }
        .scnd-font-color {
        	color: #9099b7;
        }
        .titular {
            display: block;
            line-height: 60px;
            margin: 0;
            text-align: center;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .horizontal-list {
        	margin: 0;
        	padding: 0;
        	list-style-type: none;
        }
        .horizontal-list li {
        	float: left;
        }
        .block {
        	margin: 25px 25px 0 0;
        	background: #394264;
        	border-radius: 5px;
            float: left;
            width: 300px;
            overflow: hidden;
        }
        	/******************************************** LEFT CONTAINER *****************************************/
        .menu-box {
            height: 360px;
        }
        .donut-chart-block {
        	overflow: hidden;
        }
        .donut-chart-block .titular {
        	padding: 10px 0;
        }
        .os-percentages li {
        	width: 75px;
        	border-left: 1px solid #394264;
        	text-align: center;					
        	background: #50597b;
        }
        .os {
        	margin: 0;
        	padding: 10px 0 5px;
        	font-size: 15px;		
        }
        .os.houans {
        	border-top: 4px solid #e64c65;
        }
        .os.ka {
        	border-top: 4px solid #11a8ab;
        }
        
        .os-percentage {
        	margin: 0;
        	padding: 0 0 15px 10px;
        	font-size: 15px;
        }
        .line-chart-block, .bar-chart-block {
        	height: 400px;
        }

        .grafico {
          padding: 2rem 1rem 1rem;
          width: 100%;
          height: 100%;
          position: relative;
          color: #fff;
          font-size: 80%;
        }

        [class^='eje-'] {
          position: absolute;
          left: 0;
          bottom: 0rem;
          width: 100%;
          padding: 1rem 1rem 0 2rem;
          height: 80%;
        }
        .eje-x {
          height: 2.5rem;
        }
        .eje-y li {
          height: 25%;
          border-top: 1px solid #777;
        }
        [data-ejeY]:before {
          content: attr(data-ejeY);
          display: inline-block;
          width: 2rem;
          text-align: right;
          line-height: 0;
          position: relative;
          left: -2.5rem;
          top: -.5rem;
        } 
        .eje-x li {
          width: 33%;
          float: left;
          text-align: center;
        }

        .donut-chart {
            position: relative;
        	width: 200px;
            height: 200px;
        	margin: 0 auto 2rem;
        	border-radius: 100%
         }
        p.center-date {
            background: #394264;
            position: absolute;
            text-align: center;
        	font-size: 21px;
            top:0;left:0;bottom:0;right:0;
            width: 130px;
            height: 130px;
            margin: auto;
            border-radius: 50%;
            line-height: 35px;
            padding: 15% 0 0;
        }
        .center-date span.scnd-font-color {
         line-height: 0; 
        }
        .recorte {
            border-radius: 50%;
            clip: rect(0px, 200px, 200px, 100px);
            height: 100%;
            position: absolute;
            width: 100%;
          }
        .quesito {
            border-radius: 50%;
            clip: rect(0px, 100px, 200px, 0px);
            height: 100%;
            position: absolute;
            width: 100%;
            font-family: monospace;
            font-size: 1.5rem;
          }
        #porcion1 {
            transform: rotate(1deg);
          }
      
        #porcion1 .quesito {
            background-color: #E64C65;
            transform: rotate(76deg);
          }
        
        #porcionFin {
            transform:rotate(-32deg);
          }
        #porcionFin .quesito {
            background-color: #11A8AB;
            transform: rotate(32deg);
          }
        .nota-final {
          clear: both;
          color: #4FC4F6;
          font-size: 1rem;
          padding: 2rem 0;
        }
        .nota-final strong {
          color: #E64C65;
        }
        .nota-final a {
          color: #FCB150;
          font-size: inherit;
        }
        /**************************
        BAR-CHART
        **************************/
        .grafico.bar-chart {
          background: #3468AF;
          padding: 0 1rem 2rem 1rem;
          width: 100%;
          height: 60%;
          position: relative;
          color: #fff;
          font-size: 80%;
        }
        .bar-chart [class^='eje-'] {
          padding: 0 1rem 0 2rem;
          bottom: 1rem;
        }
        .bar-chart .eje-x {
          bottom: 0;
        }
         .bar-chart .eje-y li {
          height: 20%;
          border-top: 1px solid #fff;
        }
        .bar-chart .eje-x li {
          width: 14%;
          position: relative;
          text-align: left;
        }
        .bar-chart .eje-x li i {
          transform: rotatez(-45deg) translatex(-1rem);
          transform-origin: 30% 60%;
          display: block;
        }
        .bar-chart .eje-x li:before {
          content: '';
          position: absolute;
          bottom: 1.9rem;
          width: 70%;
          right: 5%;
          box-shadow: 3px 0 rgba(0,0,0,.1), 3px -3px rgba(0,0,0,.1);
        }
        .bar-chart .eje-x li:nth-child(1):before {
          background: #E64C65;  
          height: 570%;
        }
        .bar-chart .eje-x li:nth-child(2):before {
          background: #11A8AB;  
          height: 900%;
        }
        .bar-chart .eje-x li:nth-child(3):before {
          background: #FCB150;  
          height: 400%;
        }
        .bar-chart .eje-x li:nth-child(4):before {
          background: #4FC4F6;  
          height: 290%;
        }
        .bar-chart .eje-x li:nth-child(5):before {
          background: #FFED0D;  
          height: 720%;
        }
        .bar-chart .eje-x li:nth-child(6):before {
          background: #F46FDA;  
          height: 820%;
        }
        .bar-chart .eje-x li:nth-child(7):before {
          background: #15BFCC;  
          height: 520%;
        }

    </style>
</head>
<body>
<?php include("menu.php"); ?>
&nbsp;&nbsp;
<br><br>

<!-- https://codepen.io/jlalovi/details/bIyAr -->
<div class="container">
  <!-- DONUT CHART BLOCK (LEFT-CONTAINER) --> 
    <div class="donut-chart-block block"> 
        <h2 class="titular">SENEGAL VOTE STATS</h2>
        <div class="donut-chart">
            <!-- PORCIONES GRAFICO CIRCULAR
            ELIMINADO #donut-chart
            MODIFICADO CSS de .donut-chart -->
            <div id="porcion1" class="recorte"><div class="quesito houans" data-rel="<?php echo $response[0]['pourcentage']?>"></div></div>
            <div id="porcionFin" class="recorte"><div class="quesito ka" data-rel="<?php echo $response[1]['pourcentage']?>"></div></div>
            
            <!-- FIN AÑADIDO GRÄFICO -->
            <p class="center-date">NOVEMBRE<br><span class="scnd-font-color">2022</span></p>        
        </div>
        <ul class="os-percentages horizontal-list">
            <li>
                <p class="houans os scnd-font-color"><?php echo $response[0]['nom']?></p>
                <p class="os-percentage"><?php echo $response[0]['pourcentage']?><sup>%</sup></p>
            </li>
            <li>
                <p class="ka os scnd-font-color"><?php echo $response[1]['nom']?></p>
                <p class="os-percentage"><?php echo $response[1]['pourcentage']?><sup>%</sup></p>
            </li>
            
        </ul>
    </div>
 <!-- LINE CHART BLOCK (LEFT-CONTAINER) -->
    
</div>

</body>
</HTML>