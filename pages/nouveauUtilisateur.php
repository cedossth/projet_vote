<?php

require_once("../api/db_connect.php");
require_once("../les_fonctions/fonctions.php");

//echo 'Nombre des  user1 :  '.rechercher_par_login('user1');
//echo 'Nombre des  user1@gmail.com :  '.rechercher_par_email('user1@gmail.com');
$validationErrors = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $naissance = $_POST['naissance'];
    $adresse = $_POST['adresse'];
    $pwd1 = $_POST['pwd1'];
    $pwd2 = $_POST['pwd2'];
    $email = $_POST['email'];
    $cni = $_POST['cni'];


    if (isset($pwd1) && isset($pwd2)) {

        if (empty($pwd1)) {
            $validationErrors[] = "Erreur!!! Le mot de passe ne doit pas etre vide";
        }

        if ($pwd1 !== $pwd2) {
            $validationErrors[] = "Erreur!!! les deux mot de passe ne sont pas identiques";

        }
    }

    if (isset($email)) {
        $filtredEmail = filter_var($nom, FILTER_SANITIZE_EMAIL);

        if ($filtredEmail != true) {
            $validationErrors[] = "Erreur!!! Email  non valid";

        }
    }

    if (empty($validationErrors)) {
        if (rechercher_par_cni($cni) == 0 & rechercher_par_email($email) == 0) {
            $requete=mysqli_prepare($conn,"INSERT INTO user(nom,prenom,naissance,adresse,idProfilF,mot_de_passe,mail,etat) 
                                        VALUES(?,?,?,?,?,?,?,?)");
            mysqli_stmt_bind_param($requete, 'ssssissi', $n, $p, $naiss, $ad , $idP , $mdp , $ma , $et);
            $n= $nom;
            $p= $prenom;
            $naiss= $naissance;
            $ad= $adresse;
            $idP= 2;
            $mdp= $pwd1;
            $ma= $email;
            $et= 0;

            $requete->execute();
               
            $requetes =mysqli_prepare($conn,"INSERT INTO electeurs(numCNI,idBureau,idUserF) 
                VALUES(?,?,?)");
            mysqli_stmt_bind_param($requetes, 'iii', $num, $idB , $idF);
            $num= $cni;
            $idB= 1;
            $idF=mysqli_insert_id($conn);
            $requetes->execute();

            $success_msg = "Félicitation, votre compte est crée, mais temporairement inactif jusqu'a activation par l'admin";
        } else {
            if (rechercher_par_cni($cni) > 0) {
                $validationErrors[] = 'Désolé le numero cni exsite deja';
            }
            if (rechercher_par_email($email) > 0) {
                $validationErrors[] = 'Désolé cet email exsite deja';
            }
        }

    }

}

?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>

    <title> Nouvel utilisateur </title>

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">

</head>
<body>

<div class="container col-md-6 col-md-offset-3">
    <h1 class="text-center"> Création d'un nouveau compte utilisateur</h1>

    <form class="form" method="post">

        <div class="input-container">

            <input type="text"
                   required="required"
                   minlength="4"
                   title="Le nom"
                   name="nom"
                   placeholder="Taper votre nom"
                   autocomplete="off"
                   class="form-control">
        </div>

        <div class="input-container">

            <input type="text"
                   required="required"
                   minlength="4"
                   title="Le prenom"
                   name="prenom"
                   placeholder="Taper votre prenom"
                   autocomplete="off"
                   class="form-control">
        </div>

        <div class="input-container">

            <input type="date"
                   required="required"
                   title="date de naissance"
                   name="naissance"
                   placeholder="Taper votre date de naissance"
                   autocomplete="off"
                   class="form-control">
        </div>

        <div class="input-container">

            <input type="text"
                   required="required"
                   minlength="4"
                   title="L'adresse"
                   name="adresse"
                   placeholder="Taper votre adresse"
                   autocomplete="off"
                   class="form-control">
        </div>

        <div class="input-container">
            <input type="password"
                   required="required"
                   minlength="3"
                   title="Le Mot de passe doit contenir au moins 3 caractères..."
                   name="pwd1"
                   placeholder="Taper votre mot de passe"
                   autocomplete="new-password"
                   class="form-control">
        </div>

        <div class="input-container">
            <input type="password"
                   required="required"
                   minlength="3"
                   name="pwd2"
                   placeholder="retaper votre mot de passe pour le confirmer"
                   autocomplete="new-password"
                   class="form-control">
        </div>

        <div class="input-container">

            <input type="email"
                   required="required"
                   name="email"
                   placeholder="Taper votre email"
                   autocomplete="off"
                   class="form-control">
        </div>

        <div class="input-container">

            <input type="text"
                   required="required"
                   name="cni"
                   placeholder="Taper votre numero cni"
                   autocomplete="off"
                   class="form-control">
        </div>

        <input type="submit" class="btn btn-primary" value="Enregistrer">
    </form>
    <br>
    <?php

    if (isset($validationErrors) && !empty($validationErrors)) {
        foreach ($validationErrors as $error) {
            echo '<div class="alert alert-danger">' . $error . '</div>';
        }
    }


    if (isset($success_msg) && !empty($success_msg)) {
        echo '<div class="alert alert-success">' . $success_msg . '</div>';

        header('refresh:5;url=login.php');
    }

    ?>

</div>

</body>

</html>



