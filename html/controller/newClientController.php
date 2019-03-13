<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  require("model/ClientModel.php");
  $clientModel = new ClientModel();

  $clientModel->add(
    $_POST['name'],
    $_POST['address'],
    $_POST['city'],
    $_POST['postal'],
    $_POST['country'],
    $_POST['tel'],
    $_POST['mail']
  );

  header('Location: ?page=listClients');
}
