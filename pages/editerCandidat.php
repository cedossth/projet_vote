<?php
    require_once('identifier.php');
    require_once('../api/db_connect.php');

    $id=isset($_GET['idF'])?$_GET['idF']:0;

    $requete="select * from user,candidat where idUser=idUserF and $id=idUser";

    $resultat=mysqli_query($conn,$requete);
    $utilisateur=$resultat->fetch_array();
    $nomp=$utilisateur['nomParti'];

?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition d'un candidat</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
                       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Edition du candidat :</div>
                <div class="panel-body">
                    <form method="post" action="updateCandidat.php" class="form">
						<div class="form-group">
                           <!-- <label for="id">id user:</label>-->
                            <input type="hidden" name="idcandidat" class="form-control" value="<?php echo $id ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="nom">Nom partie :</label>
                            <input type="text" name="nomp" placeholder="nom partie" class="form-control" value="<?php echo $nomp ?>"/>
                        </div>

				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span>
                            Enregistrer
                        </button>
					</form>
                </div>
            </div>   
        </div>      
    </body>
</HTML>
