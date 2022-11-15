<?php
     session_start();
    if(isset($_SESSION['user'])){
        
            require_once('../api/db_connect.php');
            
            $idUser=isset($_GET['idUser'])?$_GET['idUser']:0;

            $requete="delete from user where idUser=?";

            $resultat=mysqli_prepare($conn,$requete);

            mysqli_stmt_bind_param($resultat, "i", $idUser);
            
            $resultat->execute();
            
            $resultats=mysqli_prepare($conn,"delete from electeurs where idUserF not in (select idUser from user)");
            
            $resultats->execute();
            
            header('location:utilisateur.php');   
            
     }else {
                header('location:login.php');
        }
    
?>