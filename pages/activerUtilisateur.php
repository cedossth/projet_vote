<?php
        session_start();
        if(isset($_SESSION['user'])){
            
            require_once('../api/db_connect.php');
            
            $idUser=isset($_GET['idUser'])?$_GET['idUser']:0;
            
            $etat=isset($_GET['etat'])?$_GET['etat']:0;
        
            if($etat==1)
                $newEtat=0;
            else
                $newEtat=1;

            $requete="update user set etat=? where idUser=?";
            
            $resultat=mysqli_prepare($conn,$requete);

            mysqli_stmt_bind_param($resultat, "ii", $newEtat,$idUser);
            
            $resultat->execute();
            
            header('location:utilisateur.php');
            
     }else {
                header('location:login.php');
        }
?>