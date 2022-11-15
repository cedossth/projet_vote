<?php
    session_start();
    if(isset($_SESSION['user'])){
        
        require_once('../api/db_connect.php');
        $idUser=$_SESSION['user']['idUser'];
        $a_vote=1;
        
        $nbVote=isset($_GET['nVote'])?$_GET['nVote']:0;
        $idC=isset($_GET['idC'])?$_GET['idC']:0;
        $newNbVote=$nbVote+1;
    
        $requete="update user set a_vote=? where idUser=?";
        
        $resultat=mysqli_prepare($conn,$requete);
        mysqli_stmt_bind_param($resultat, "ii", $a_vote,$idUser);
        
        $resultat->execute();
        $resultats=mysqli_prepare($conn,"update candidat set nombre_vote=? where idCandidat=?");
        
        mysqli_stmt_bind_param($resultats, "ii", $newNbVote,$idC);
        $resultats->execute();
        
        header('refresh:5;url=login.php');
        
    }else{
               header('location:login.php');
    }
?>