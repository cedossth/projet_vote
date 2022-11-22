<?php
    require_once('identifier.php');

    require_once('../api/db_connect.php');

    $id=isset($_POST['iduser'])?$_POST['iduser']:0;

    $login=isset($_POST['login'])?$_POST['login']:"";

    $cni=isset($_POST['cni'])?($_POST['cni']):"";

    $resultat=mysqli_prepare($conn,"update user set mail=?, numCNI=? where idUser=?");

    mysqli_stmt_bind_param($resultat, "ssi", $login,$cni,$id);
            
    $resultat->execute();
    
    header('refresh:3;url=utilisateur.php');
?>
