<?php
    require_once('identifier.php');
    require_once("../api/db_connect.php");
    
    /*
    if(isset($_GET['nomF']))
        $nomf=$_GET['nomF'];
    else
        $nomf="";
    */

    $requete="select * from user,electeurs,candidat where idUser=idUser and idElecteur=idElecteurF";

    /*$resultatC=$conn->query($requete);*/
    $resultatC=mysqli_query($conn,$requete);
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Gestion des candidats</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
            <div class="panel panel-success margetop60">
          
				<div class="panel-heading">Liste des candidats</div>
				<div class="panel-body">
					
					<form method="get" action="candidat.php" class="form-inline">
                        
                        &nbsp;&nbsp;
                        
                       	<?php if ($_SESSION['user']['idProfilF']==1) {?>
                       	
                            <a href="nouveauCandidat.php"><span class="glyphicon glyphicon-plus"></span>Nouveau candidat</a>
                            
                        <?php } ?>                 
                         
					</form>
				</div>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Les candidats</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id candidat</th><th>Nom</th><th>Prenom</th><th>Nom Partie</th>
                                <?php if ($_SESSION['user']['idProfilF']== 1) {?>
                                	<th>Actions</th>
                                <?php }?>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($candidat=mysqli_fetch_array($resultatC, MYSQLI_ASSOC)){ ?>
                                <tr>
                                    <td><?php echo $candidat['idCandidat'] ?> </td>
                                    <td><?php echo $candidat['nom'] ?> </td>
                                    <td><?php echo $candidat['prenom'] ?> </td>
                                    <td><?php echo $candidat['nomParti'] ?> </td> 
                                    
                                     <?php if ($_SESSION['user']['idProfilF']== 1) {?>
                                        <td>
                                            <a href="editerCandidat.php?idF=<?php echo $candidat['idCandidat'] ?>">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            &nbsp;
                                            <a onclick="return confirm('Etes vous sur de vouloir supprimer la filière')"
                                                href="supprimerCandidat.php?idF=<?php echo $candidat['idCandidat'] ?>">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td>
                                    <?php }?>
                                    
                                </tr>
                            <?PHP } ?>
                       </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</HTML>