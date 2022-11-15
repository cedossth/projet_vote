<?php
    require_once('identifier.php');
    require_once("../api/db_connect.php");

    $requete="select * from lieu,bureau where idLieu=idLieuF";

    $resultatC=mysqli_query($conn,$requete);
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>

    <title> Nouveau bureau </title>
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">

</head>
    <body>
        <?php include("menu.php"); ?>
        <div class="panel margetop60">
            <div class="col-md-4 offset-5 text-center">
                <a href="bureau.php" class="btn btn-primary btn-sm">NOUVEAU BUREAU</a>
            </div>
        </div>
        <div class="container">
            <div class="panel panel-success margetop60">
                <div class="panel-heading">Liste des bureaux</div>
            </div>
            <div class="panel panel-info">
                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>BUREAU</th>
                                <th>LIEU</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php while($lieu=mysqli_fetch_array($resultatC, MYSQLI_ASSOC)){ ?>
                                <tr>
                                    <td><?php echo $lieu['idBureau'] ?> </td>
                                    <td><?php echo $lieu['codeB'] ?> </td>
                                    <td><?php echo $lieu['nomL'] ?> </td>
                                </tr>
                            <?PHP } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
