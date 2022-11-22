<?php
    require_once("../api/db_connect.php");

    $users=json_decode(file_get_contents("http://127.0.0.1/api/users"));

    $validationErrors = array();

    $exist='';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    extract($_POST);


    if (isset($cni)) {

        if (empty($cni)) {
            $validationErrors[] = "Erreur!!! Le cni ne doit pas etre vide";
        }
    }

    if (empty($validationErrors)) {
        foreach ($users as $u){
            if ($cni == $u->numCNI){
                $exist='yes';
                $use=$u;
            }
        }
        if ($exist=='yes') {
           echo '<div class="alert alert-success">' ."Vous êtes bien inscrit au nom de $use->nom $use->prenom ayant pour mail $use->mail et mot de passe $use->mot_de_passe" . '</div>';
           echo '<a href="login.php">se connecter</a>';
        } else {
            echo '<div class="alert alert-danger">' . "Vous n'êtes pas inscrit" . '</div>';
            echo '<a href="nouveauUtilisateur.php">créer un compte</a>';
        }

    }

}

    
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Verification inscription</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>

        <div class="container col-md-6 col-md-offset-3">
        <br>
        <div class="panel panel-primary ">
            <div class="panel-heading">Verifier votre inscription</div>
            <div class="panel-body">
                <form method="post" class="form">

                    <div class="form-group">
                        <label class="control-label">
                            Veuillez saisir votre numero cni
                        </label>

                        <input minlength="13" type="text" name="cni" class="form-control"/>
                    </div>

                    <button type="submit" class="btn btn-success">Verifier</button>

                </form>
            </div>
        </div>
    </body>
</HTML>