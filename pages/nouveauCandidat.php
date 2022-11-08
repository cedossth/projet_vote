<?php
    require_once('identifier.php');
    require_once("../api/db_connect.php");
    $login=isset($_GET['login'])?$_GET['login']:"";
    
    $size=isset($_GET['size'])?$_GET['size']:3;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
   
    $requeteUser="select * from user,electeurs where idUser=idUserF and nom like '%$login%'";
    $requeteCount="select count(*) countUser from user";
   
    $resultatUser=mysqli_query($conn,$requeteUser);
    $resultatCount=mysqli_query($conn,$requeteCount);

    $tabCount=$resultatCount->fetch_array();
    $nbrUser=$tabCount['countUser'];
    $reste=$nbrUser % $size;   
    if($reste===0) 
        $nbrPage=$nbrUser/$size;   
    else
        $nbrPage=floor($nbrUser/$size)+1;  
?>
<! DOCTYPE HTML>
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
                       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Veuillez saisir les données du nouveau candidat</div>
                <div class="panel-body">
                    <form method="post" action="insertCandidat.php" class="form">
						
                        <div class="form-group">
                             <label for="partie">Nom de partie:</label>
                            <input type="text" name="nomP" 
                                   placeholder="Nom de la partie"
                                   class="form-control"/>
                        </div>
                        
                        <div class="form-group">
                            <label for="identifiant">identifiant electeur:</label>
				            <input type="number" name="idE" 
                                   placeholder="id electeur"
                                   class="form-control"/>
                        </div>
                        
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span>
                            Enregistrer
                        </button> 
                      
					</form>
                </div>
            </div>
            
        </div> 

        <div class="container">
            <div class="panel panel-success margetop60">
				<div class="panel-heading">Rechercher des utilisateurs</div>
				<div class="panel-body">
					<form method="get" action="nouveauCandidat.php" class="form-inline">
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
                                <th>idElecteur</th> <th>nom</th> <th>prenom</th> <th>numero_cni</th> <th>Email</th> <th>date_naissance</th> <th>Role</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($user=$resultatUser->fetch_assoc()){ ?>
                                <tr class="<?php echo $user['etat']==1?'success':'danger'?>">
                                    <td><?php echo $user['idElecteur'] ?> </td>
                                    <td><?php echo $user['nom'] ?> </td>
                                    <td><?php echo $user['prenom'] ?> </td>
                                    <td><?php echo $user['numCNI'] ?> </td>
                                    <td><?php echo $user['mail'] ?> </td>
                                    <td><?php echo $user['naissance'] ?> </td>
                                    <td><?php echo $user['etat'] ?> </td>   
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div>
                        <ul class="pagination">
                            <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                                <li class="<?php if($i==$page) echo 'active' ?>"> 
                                    <a href="utilisateur.php?page=<?php echo $i;?>&login=<?php echo $login ?>">
                                    <?php echo $i; ?>
                                    </a> 
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body>
</HTML>
