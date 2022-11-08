<?php
    require_once('identifier.php');
    require_once("../api/db_connect.php");

    $requete="select idRegion,nomR,count(*) as nb_depart from region,departement where idRegion=idRegionF group by idRegion";

    $resultatC=mysqli_query($conn,$requete);
?>


<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Liste des regions</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>

        <div class="container">
            <div class="panel panel-success margetop60">
				<div class="panel-heading">Liste des regions</div>
			</div>

            <div class="panel panel-info">

                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>REGION</th>
                                <th>NOMBRE_DEPARTEMENTS</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php while($region=mysqli_fetch_array($resultatC, MYSQLI_ASSOC)){ ?>
                                <tr>
                                    <td><?php echo $region['idRegion'] ?> </td>
                                    <td><?php echo $region['nomR'] ?> </td>
                                    <td><?php echo $region['nb_depart'] ?> </td>
                                </tr>
                            <?PHP } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</HTML>
