<?php

require_once ('identifier.php');

require_once ('../api/db_connect.php');

$iduser=$_SESSION['user']['idUser'];

$oldpwd=isset($_POST['oldpwd'])?$_POST['oldpwd']:"";

$newpwd=isset($_POST['newpwd'])?$_POST['newpwd']:"";

$resultat=mysqli_prepare($conn,"select * from user where idUser=$iduser and mot_de_passe='$oldpwd'");

$resultat->execute();

$msg="";
$interval=3;
$url="login.php";


if($resultat->store_result()) {
    $resultat = mysqli_prepare($conn,"update user set mot_de_passe=? where idUser=?");
    mysqli_stmt_bind_param($resultat, 'si', $new, $id);
    $new=$newpwd;
    $id=$iduser;
    $resultat->execute();

    $msg="<div class='alert alert-success' >
                <strong>Félicitation!</strong> Votre mot de passe est modifié avec succés
           </div>";

}else{
    $msg="<div class='alert alert-danger' >
            <strong>Erreur!</strong> L'ancien mot de passe est incorrect !!!!
           </div>";
    $url=$_SERVER['HTTP_REFERER'];
}

?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Changement de mot de passe</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <br><br>
        <?php
            echo  $msg;
            header("refresh:$interval;url=$url");
        ?>

    </div>
</body>
</html>


