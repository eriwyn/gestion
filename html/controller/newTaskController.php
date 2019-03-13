<?php

require("model/TaskModel.php");
require("model/ClientModel.php");
require("model/PurchaseModel.php");

$taskModel = new TaskModel();
$clientModel = new ClientModel();
$purchaseModel = new PurchaseModel();

if (!$clientModel->idExists($_GET['client_id'])) {
  header('Location: ?page=listClients');
  exit();
}

$purchases = $purchaseModel->findUncompletedByClient($_GET['client_id']);

$defaultClientId = -1;
if (isset($_GET['purchase_id'])) {
  $defaultClientId = $_GET['purchase_id'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $taskModel->add(
    $_POST['purchase'],
    $_POST['name'],
    $_POST['description']
  );

  header('Location: ?page=client&id=' . $_GET['client_id']);
  exit();
}
