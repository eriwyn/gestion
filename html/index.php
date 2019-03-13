<?php

ini_set('display_errors', 1);

require('library/Database.php');
require('library/Connection.php');
require('library/Upload.php');

session_start();

$connection = new Connection();

// Chargement des bons fichiers en fonction de l'url

if (isset($_GET['page'])) {
  $controllerPath = "controller/". $_GET['page'] ."Controller.php";
  $viewPath = "view/". $_GET['page'] ."View.php";

  if (is_readable($controllerPath) && is_readable($viewPath)) {
    // On redirige vers la page de connexion si l'utilisateur n'est pas connecté

    if (!$connection->isConnected()) {
      header('Location: /');
      exit();
    }

    require("controller/". $_GET['page'] ."Controller.php");
    require("view/". $_GET['page'] ."View.php");
  } else {
    http_response_code(404);
    require("controller/404Controller.php");
    require("view/404View.php");
  }
} else {

  // On redirige vers la page des clients si l'utilisateur est connecté


  if ($connection->isConnected()) {
    header('Location: ?page=listClients');
    exit();
  }

  require("controller/loginController.php");
  require("view/loginView.php");
}

require('template.php');
