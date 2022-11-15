<?php
    require_once('identifier.php');
    require_once("../api/db_connect.php");

    $candidat=json_decode(file_get_contents("http://127.0.0.1/api/candidats"));

    
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Vote</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
            
            <div class="panel panel-primary margetop60">
                <div class="panel-heading">Listes</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Candidat</th><th>Nom</th><th>Prenom</th><th>Nom Partie</th>
                                <?php if ($_SESSION['user']['a_vote']== 0) {?>
                                	<th>Voter</th>
                                <?php }?>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach($candidat as $c): ?>
                                <tr>
                                    <td><?php echo $c->idCandidat?> </td>
                                    <td><?php echo $c->nom?> </td>
                                    <td><?php echo $c->prenom?> </td>
                                    <td><?php echo $c->nomParti?> </td> 
                                    
                                     <?php if ($_SESSION['user']['a_vote']== 0) {?>
                                        <td>
                                            <a onclick="return confirm('Etes vous sur de vouloir voter pour ce candidat')"
                                                href="voterCandidat.php?nVote=<?php echo $c->nombre_vote?>&idC=<?php echo $c->idCandidat?>">
                                                    <span class="glyphicon glyphicon-check"></span>
                                            </a>
                                        </td>
                                    <?php }?>
                                    
                                </tr>
                            <?PHP endforeach; ?>
                       </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</HTML>