<?php
require_once('identifier.php');
require_once("../api/db_connect.php");


function get_option($d){
    global $conn;
    $requetes="select * from departement";
    $resultats=mysqli_query($conn,$requetes);
    $options='';
    foreach ($resultats as $result){
        if ($d==$result['idDepartement']){
            $options.='<option value="'. $result['idDepartement'] .'" selected>'.$result['nomD'].'</option>';
        }else{
            $options.='<option value="'. $result['idDepartement'] .'">'.$result['nomD'].'</option>';
        }
    }
    return $options;
}

if(isset($_GET['departement'])){
    $dep=$_GET['departement'];
    $requete="select * from commune,departement where idDepartF=idDepartement and idDepartement=$dep";
}else{
    $dep='';
    $requete="select * from commune,departement where idDepartF=idDepartement";
}
$resultat=mysqli_query($conn,$requete);

if(isset($_GET['commune'])){
    $com=$_GET['commune'];
    $requetes="select * from commune,lieu where idCommuneF=idCommune and idCommune=$com";
}else{
    $com='';
    $requetes="select * from commune,lieu where idCommuneF=idCommune";
}
$resultats=mysqli_query($conn,$requetes);



if ( isset($_POST['ajout'])) {

    extract($_POST);
    
    if (empty($validationErrors)) {
        
        $requete=mysqli_prepare($conn,"INSERT INTO bureau(codeB,idLieuF) VALUES(?,?)");
        mysqli_stmt_bind_param($requete, 'ii', $c, $idF);
        $c= $bureau;
        $idF= $lieu;
        $requete->execute();
           
        $success_msg = "Félicitation, le bureau est créé";

    }

}
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>

    <title> Nouveau bureau </title>
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">

</head>
    <body>
        <?php include("menu.php"); ?>
        <div class="panel margetop60">
            <div class="col-md-4 offset-5 text-center">
                <a href="liste_bureau.php" class="btn btn-primary btn-sm">LISTE DES BUREAUX</a>
            </div>
        </div>

        <div class="container">
            <div class="panel panel-success margetop60">
                <div class="panel-heading text-center">Création d'un nouveau bureau de vote</div>
            </div>

            <div class="container col-md-6 col-md-offset-3">

            <form class="form" method="get" action="">

                <div class="row mt-4">
                    <div class="col-md-3">
                        <label for="dep">DEPARTEMENT</label>
                    </div>
                    <div class="col-md-8">
                        <select name="departement" id="dep" class="form-control" required="required" onchange="this.form.submit();">
                            <option value="" disabled selected>--- choisir un departement ---</option>
                            <?php echo get_option($dep);?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row mt-4">
                    <div class="col-md-3">
                        <label>COMMUNE</label>
                    </div>
                    <div class="col-md-8">
                        <select name="commune" id="com" class="form-control" required="required" onblur="this.form.submit();">
                            <option value="" disabled selected>--- choisir une commune ---</option>
                            <?php
                                    while ($result=mysqli_fetch_assoc($resultat)){
                                        if ($com==$result['idCommune']){
                                        ?>
                                        <option value="<?= $result['idCommune'] ?>" selected><?= $result['nomC'] ?></option>
                                    <?php  
                                    }else{?>
                                        <option value="<?= $result['idCommune'] ?>"><?= $result['nomC'] ?></option>
                                        <?php } 
                                    
                                
                                    }
                                    ?>
                        </select>
                    </div>
                </div>
            </form>

            <form class="form" method="post" action="#!">
                <br>
                <div class="row mt-4">
                    <div class="col-md-3">
                        <label>LIEU</label>
                    </div>
                    <div class="col-md-8">
                        <select name="lieu" id="com" class="form-control" required="required">
                            <option value="" disabled selected>--- choisir un lieu ---</option>
                            <?php
                                    while ($result=mysqli_fetch_assoc($resultats)){
                                        ?>
                                        <option value="<?= $result['idLieu'] ?>"><?= $result['nomL'] ?></option>
                                    <?php  }
                                    ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row mt-4">
                    <div class="col-md-3">
                        <label>BUREAU</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number"
                            required="required"
                            title="le bureau"
                            name="bureau"
                            placeholder="Taper le numero du bureau"
                            autocomplete="off"
                            class="form-control">
                    </div>
                </div>
                <br>
                <input type="submit" name="ajout" class="btn btn-primary" value="Enregistrer">
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



