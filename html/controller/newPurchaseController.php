<?php

require("model/PurchaseModel.php");
require("model/ClientModel.php");

$purchaseModel = new PurchaseModel();
$clientModel = new ClientModel();

if (!$clientModel->idExists($_GET['client_id'])) {
  header('Location: ?page=listClients');
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $purchaseModel->add(
    $_GET['client_id'],
    $_POST['name'],
    $_POST['description'],
    $_POST['hours'],
    $_POST['purchaseDate']
  );

  header('Location: ?page=client&id=' . $_GET['client_id']);
  exit();
}
