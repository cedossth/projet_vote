<?php
    require_once('identifier.php');
    require_once("../api/db_connect.php");

    $requete="select idRegion,nomR,group_concat(nomD) as nom_departement,count(nomD) as nbDepart from region,departement where idRegion=idRegionF group by idRegion";

    $resultatC=mysqli_query($conn,$requete);
?>


<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Liste des departements</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>

        <div class="container">
            <div class="panel panel-success margetop60">
				<div class="panel-heading">Liste des departements</div>
			</div>

            <div class="panel panel-info">

                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>REGION</th>
                                <th>DEPARTEMENTS</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php while($region=mysqli_fetch_assoc($resultatC)){ $de=explode(',', $region['nom_departement']);?>
                                <tr>
                                    <td rowspan="<?php echo ($region['nbDepart'])+1 ?>"><?php echo $region['idRegion'] ?> </td>
                                    <td rowspan="<?php echo ($region['nbDepart'])+1 ?>"><?php echo $region['nomR'] ?> </td>
                                    <?php  
                                    foreach($de as $des){?> 
                                        <tr><td class="child"><?php echo $des ?> </td></tr>
                                    <?php }
                                    ?> 
                                </tr>
                            <?PHP } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</HTML>