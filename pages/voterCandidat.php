<?php
    session_start();
    if(isset($_SESSION['user'])){
        
        require_once('../api/db_connect.php');
        $idUser=$_SESSION['user']['idUser'];
        $a_vote=1;
        
        $nbVote=isset($_GET['nVote'])?$_GET['nVote']:0;
        $idC=isset($_GET['idC'])?$_GET['idC']:0;
        $newNbVote=$nbVote+1;
    
        $requete="update user set a_vote=?, vote_pour=? where idUser=?";
        
        $resultat=mysqli_prepare($conn,$requete);
        mysqli_stmt_bind_param($resultat, "iii", $a_vote,$idC,$idUser);
        
        $resultat->execute();
        $resultats=mysqli_prepare($conn,"update candidat set nombre_vote=? where idCandidat=?");
        
        mysqli_stmt_bind_param($resultats, "ii", $newNbVote,$idC);
        $resultats->execute();

        $success_msg = "Félicitation, votre vote est enregistré";

        if (isset($success_msg) && !empty($success_msg)) {
            echo '<div class="alert alert-success">' . $success_msg . '</div>';
    
            header('refresh:5;url=login.php');
        }
        
        
    }else{
               header('location:login.php');
    }
?>