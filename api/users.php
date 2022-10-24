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
        getUser($id);
      }
      else
      {
        // Récupérer tous les utilisateurs
        getUsers();
      }
      break;
    case 'POST':
        // Ajouter un utilisateur
       addUser();
      break;
    default:
      // Requête invalide
      header("HTTP/1.0 405 Method Not Allowed");
      break;
  }

  function getUsers()
  {
    global $conn;
    $query = "SELECT * FROM user,profil where idProfil=idProfilF";
    $response = array();
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
      $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
  }

  function getUser($id=0)
  {
    global $conn;
    $query = "SELECT * FROM user";
    if($id != 0)
    {
      $query .= " WHERE idUser=".$id." LIMIT 1";
    }
    $response = array();
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
      $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
  }

  function addUser()
  {
    global $conn;
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $naissance = date('Y-m-d');
    $adresse = $_POST["adresse"];
    $idProfilF = $_POST["idProfilF"];
    $mot_de_passe = $_POST["mot_de_passe"];
    $mail = $_POST["mail"];
    echo $query="INSERT INTO user(nom, prenom, naissance, adresse, idProfilF, mot_de_passe, mail) VALUES('".$nom."', '".$prenom."', '".$naissance."', '".$adresse."', '".$idProfilF."', '".$mot_de_passe."', '".$mail."')";
    if(mysqli_query($conn, $query))
    {
      $response=array(
        'status' => 1,
        'status_message' =>'utilisateur ajoute avec succes.'
      );
    }
    else
    {
      $response=array(
        'status' => 0,
        'status_message' =>'ERREUR!.'. mysqli_error($conn)
      );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }
?>