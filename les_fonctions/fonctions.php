<?php

function rechercher_par_cni($cni){
    global $conn;
    $requete=mysqli_prepare($conn,"select * from electeurs where numCNI =?");
    mysqli_stmt_bind_param($requete, "i", $cni);
    $requete->execute();
    $requete->store_result();
    return $requete->num_rows();
}

function rechercher_par_email($email){
    global $conn;
    $requete=mysqli_prepare($conn,"select * from user where mail =?");
    mysqli_stmt_bind_param($requete, "s", $email);
    $requete->execute();
    $requete->store_result();
    return $requete->num_rows();
}

function rechercher_user_par_email($email){
    global $conn;

    $requete=mysqli_prepare($conn,"select * from user where mail =?");
    mysqli_stmt_bind_param($requete, "s", $email);
    mysqli_stmt_execute($requete);
    $result = mysqli_stmt_get_result($requete);
    //$requete->execute();
    //$user=$requete->fetch();
    $user=mysqli_fetch_assoc($result);

    if($user)
        return $user;
    else
        return null;
}

function liste_depart(){
    global $conn;
    $requete="select * from departement";
    $resultatC=mysqli_query($conn,$requete);
    //$resultat=mysqli_fetch_assoc($resultatC);
    return $resultatC;
}