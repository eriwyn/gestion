<?php

require("model/ClientModel.php");

$clientModel = new ClientModel();

if (!$clientModel->idExists($_GET['id'])) {
  header('Location: ?page=listClients');
  exit();
}

$client = $clientModel->findById($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $clientModel->edit(
    $client['id'],
    $_POST['name'],
    $_POST['address'],
    $_POST['city'],
    $_POST['postal'],
    $_POST['country'],
    $_POST['tel'],
    $_POST['mail']
  );

  header('Location: ?page=client&id=' . $client['id']);
  exit();
}
