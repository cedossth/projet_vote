<?php
    require_once('identifier.php');

    require_once('../api/db_connect.php');

    $id=isset($_POST['idcandidat'])?$_POST['idcandidat']:0;

    $nomp=isset($_POST['nomp'])?$_POST['nomp']:"";

    $resultat=mysqli_prepare($conn,"update candidat set nomParti=? where idElecteurF=?");

    mysqli_stmt_bind_param($resultat, "si", $nomp,$id);
            
    $resultat->execute();
    
    header('refresh:3;url=candidat.php');
?>
