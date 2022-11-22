<?php
     session_start();
    if(isset($_SESSION['user'])){
        
            require_once('../api/db_connect.php');
            
            $id=isset($_GET['idF'])?$_GET['idF']:0;

            $requete="delete from candidat where idUserF=?";

            $resultat=mysqli_prepare($conn,$requete);

            mysqli_stmt_bind_param($resultat, "i", $id);
            
            $resultat->execute();
            
            header('location:candidat.php');   
            
     }else {
                header('location:login.php');
        }
    
?>