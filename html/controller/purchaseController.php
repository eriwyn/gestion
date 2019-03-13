<?php

require("model/ClientModel.php");
require("model/PurchaseModel.php");
require("model/TaskModel.php");

$clientModel = new ClientModel();
$purchaseModel = new PurchaseModel();
$taskModel = new TaskModel();

if (!$purchaseModel->idExists($_GET['id'])) {
  header('Location: ?page=listClients');
  exit;
}

$client = $clientModel->findById($_GET['id']);
$purchase = $purchaseModel->findById($_GET['id']);
$tasks = $taskModel->findByPurchase($_GET['id']);
