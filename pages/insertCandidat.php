<?php
    require_once('identifier.php');
    require_once('../api/db_connect.php');
    
    $nomp=isset($_POST['nomP'])?$_POST['nomP']:"";
    $id=isset($_POST['idE'])?$_POST['idE']:"";
    
    $resultat=mysqli_prepare($conn,"insert into candidat(nomParti,idElecteurF) values(?,?)");
    mysqli_stmt_bind_param($resultat, "si", $nomp,$id);
    $resultat->execute();
    
    header('location:candidat.php');
?>