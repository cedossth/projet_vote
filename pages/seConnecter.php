<?php
    session_start();
    require_once('../api/db_connect.php');
    
    $login=isset($_POST['login'])?$_POST['login']:"";
    
    $pwd=isset($_POST['pwd'])?$_POST['pwd']:"";

    $requete="select idUser,mail,idProfilF,etat,a_vote,est_inscrit from user where mail='$login' and mot_de_passe='$pwd'";
    
    $resultat=mysqli_query($conn,$requete);
    if($user=mysqli_fetch_array($resultat, MYSQLI_ASSOC)){
       
        if($user['etat']==1){
            
            $_SESSION['user']=$user;
            header('location:../index.php');
            
        }else{
            
            $_SESSION['erreurLogin']="<strong>Erreur!!</strong> Votre compte est temporairement désactivé.<br>";
            header('location:login.php');
        }
    }else{
        $_SESSION['erreurLogin']="<strong>Erreur!!</strong> Login ou mot de passe incorrecte!!!";
        header('location:login.php');
    }

?>
