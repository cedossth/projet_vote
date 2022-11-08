<?php
    require_once('identifier.php');
    require_once("../api/db_connect.php");

    $requete="select idDepartement,nomD,group_concat(nomC) as nom_commune,count(nomC) as nbCom from departement,commune where idDepartement=idDepartF group by idDepartement";

    $resultatC=mysqli_query($conn,$requete);
?>


<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Liste des communes</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>

        <div class="container">
            <div class="panel panel-success margetop60">
				<div class="panel-heading">Liste des communes</div>
			</div>

            <div class="panel panel-info">

                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>DEPARTEMENTS</th>
                                <th>COMMUNES</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php while($depart=mysqli_fetch_assoc($resultatC)){ $de=explode(',', $depart['nom_commune']);?>
                                <tr>
                                    <td rowspan="<?php echo ($depart['nbCom'])+1 ?>"><?php echo $depart['idDepartement'] ?> </td>
                                    <td rowspan="<?php echo ($depart['nbCom'])+1 ?>"><?php echo $depart['nomD'] ?> </td>
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