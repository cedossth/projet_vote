<?php
  // Se connecter à la base de données
  include("db_connect.php");
  $request_method = $_SERVER["REQUEST_METHOD"];
  
  switch($request_method)
  {
    case 'GET':
      if(!empty($_GET["id"]))
      {
        // Récupérer un seul user
        $id = intval($_GET["id"]);
        getCandidat($id);
      }
      else
      {
        // Récupérer tous les utilisateurs
        getCandidats();
      }
      break;
    case 'POST':
        // Ajouter un vote
       addVote();
      break;
    default:
      // Requête invalide
      header("HTTP/1.0 405 Method Not Allowed");
      break;
  }

  function getCandidats()
  {
    global $conn;
    $query = "SELECT * FROM candidat,electeurs,user where idUser=idUserF and idElecteur=idElecteurF";
    $response = array();
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
      $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
  }

  function getCandidat(){

  }
  function addVote(){

  }
?>