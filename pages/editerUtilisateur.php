<?php
    require_once('identifier.php');
    require_once('../api/db_connect.php');

    $id=isset($_GET['id'])?$_GET['id']:0;

    $requete="select * from user where idUser=$id";

    $resultat=mysqli_query($conn,$requete);
    $utilisateur=$resultat->fetch_array();
    $login=$utilisateur['mail'];
    $cni=$utilisateur['numCNI'];

?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition d'un utilisateur</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
                       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Edition de l'utilisateur :</div>
                <div class="panel-body">
                    <form method="post" action="updateUtilisateur.php" class="form">
						<div class="form-group">
                           <!-- <label for="id">id user:</label>-->
                            <input type="hidden" name="iduser" class="form-control" value="<?php echo $id ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="nom">Login :</label>
                            <input type="email" name="login" placeholder="email" class="form-control" value="<?php echo $login ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="prenom">CNI :</label>
                            <input type="text" name="cni" placeholder="cni" class="form-control"
                                   value="<?php echo $cni ?>"/>
                        </div>

				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span>
                            Enregistrer
                        </button>

                        <a href="editerPwd.php">Changer le mot de passe</a>
                      
					</form>
                </div>
            </div>   
        </div>      
    </body>
</HTML>
