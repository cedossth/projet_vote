<?php
require_once('identifier.php');
require_once("../api/db_connect.php");
require_once("../les_fonctions/fonctions.php");

$dep=liste_depart();


if (isset($_POST['commune'])){
    $com=$_POST['commune'];
    $requete="select * from commune,departement where idDepartF=idDepartement and idDepartement=$com";
    $resultat=mysqli_query($conn,$requete);
}else{
    $requete="select * from commune,departement where idDepartF=idDepartement";
    $resultat=mysqli_query($conn,$requete);
}
?>
<script>
    function actualiser(){
        var idi=this.options[this.selectedIndex].value; 
        document.cookie="idit = " +idi;
    }
</script>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>

    <title> Nouveau lieu </title>
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">

</head>
    <body>
        <?php include("menu.php"); ?>
        <div class="panel margetop60">
            <div class="col-md-4 offset-5 text-center">
                <a href="liste_lieu.php" class="btn btn-primary btn-sm">LISTE DES LIEU</a>
            </div>
        </div>

        <div class="container">
            <div class="panel panel-success margetop60">
                <div class="panel-heading text-center">Création d'un nouveau lieu de vote</div>
            </div>

            <div class="container col-md-6 col-md-offset-3">

            <form class="form" method="post" action="#!">

                <div class="row mt-4">
                    <div class="col-md-3">
                        <label>DEPARTEMENT</label>
                    </div>
                    <div class="col-md-8">
                        <select name="departement" id="" class="form-control" required="required" onblur="document.getElementById('com').value=this.options[this.selectedIndex].value;">
                            <option value="" disabled selected>--- choisir un departement ---</option>
                            <?php
                                
                                while ($result=mysqli_fetch_assoc($dep)){
                                    ?>
                                    <option value="<?= $result['idDepartement'] ?>"><?= $result['nomD'] ?></option>
                                <?php  }
                                ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row mt-4">
                    <div class="col-md-3">
                        <label>COMMUNE</label>
                    </div>
                    <div class="col-md-8">
                        <select name="commune" id="com" class="form-control" required="required">
                            <option value="" disabled selected>--- choisir une commune ---</option>
                            <?php
                                    while ($result=mysqli_fetch_assoc($resultat)){
                                        ?>
                                        <option value="<?= $result['idCommune'] ?>"><?= $result['nomC'] ?></option>
                                    <?php  }
                                    ?>
                        </select>
                    </div>
                </div>
                <br>
            </form>
            <form class="form" method="post" action="" onchange="this.form.submit();">
                <div class="row mt-4">
                    <div class="col-md-3">
                        <label>LIEU</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text"
                            required="required"
                            title="le lieu"
                            name="lieu"
                            placeholder="Taper le nom du lieu"
                            autocomplete="off"
                            class="form-control">
                    </div>
                </div>
                <br>
                <input type="submit" class="btn btn-primary" value="Enregistrer">
            </form>
            <br><br>
            <?php

            if (isset($validationErrors) && !empty($validationErrors)) {
                foreach ($validationErrors as $error) {
                    echo '<div class="alert alert-danger">' . $error . '</div>';
                }
            }
            if (isset($success_msg) && !empty($success_msg)) {
                echo '<div class="alert alert-success">' . $success_msg . '</div>';
                
            }

            ?>

        </div>

    </body>

</html>



