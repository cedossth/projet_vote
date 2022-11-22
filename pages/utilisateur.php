<?php
    require_once('role.php');
    require_once("../api/db_connect.php");
    $login=isset($_GET['login'])?$_GET['login']:"";
    
   
    $requeteUser="select * from user where nom like '%$login%'";
    $requeteCount="select count(*) countUser from user";
   
    $resultatUser=mysqli_query($conn,$requeteUser);
    $resultatCount=mysqli_query($conn,$requeteCount);

    $tabCount=$resultatCount->fetch_array();
    $nbrUser=$tabCount['countUser'];
    
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Gestion des utilisateurs</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
            <div class="panel panel-success margetop60">
				<div class="panel-heading">Rechercher des utilisateurs</div>
				<div class="panel-body">
					<form method="get" action="utilisateur.php" class="form-inline">
						<div class="form-group">
                            <input type="text" name="login" 
                                   placeholder="nom"
                                   class="form-control"
                                   value="<?php echo $login ?>"/>
                        </div>
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"></span>
                            Chercher...
                        </button> 
					</form>
				</div>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des utilisateurs (<?php echo $nbrUser ?> utilisateurs)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>nom</th> <th>prenom</th> <th>numero_cni</th> <th>Email</th> <th>date_naissance</th> <th>Etat</th> <th>Actions</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($user=$resultatUser->fetch_assoc()){ ?>
                                <tr class="<?php echo $user['etat']==1?'success':'danger'?>">
                                    <td><?php echo $user['nom'] ?> </td>
                                    <td><?php echo $user['prenom'] ?> </td>
                                    <td><?php echo $user['numCNI'] ?> </td>
                                    <td><?php echo $user['mail'] ?> </td>
                                    <td><?php echo $user['naissance'] ?> </td>
                                    <td><?php echo $user['etat'] ?> </td>  
                                    <td>
                                        <a href="editerUtilisateur.php?id=<?php echo $user['idUser'] ?>">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        &nbsp;&nbsp;
                                        <a onclick="return confirm('Etes vous sur de vouloir supprimer cet utilisateur')"
                                            href="supprimerUtilisateur.php?idUser=<?php echo $user['idUser'] ?>">
                                                <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                        &nbsp;&nbsp;
                                        <a href="activerUtilisateur.php?idUser=<?php echo $user['idUser'] ?>&etat=<?php echo $user['etat']  ?>">  
                                            <?php  
                                                if($user['etat']==1)
                                                    echo '<span class="glyphicon glyphicon-remove"></span>';
                                                else 
                                                    echo '<span class="glyphicon glyphicon-ok"></span>';
                                            ?>
                                        </a>
                                    </td>       
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</HTML>
