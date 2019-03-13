<?php

require("model/ClientModel.php");
require("model/TaskModel.php");
require("model/ContactModel.php");
require("model/PurchaseModel.php");

$clientModel = new ClientModel();
$taskModel = new TaskModel();
$contactModel = new ContactModel();
$purchaseModel = new PurchaseModel();

if (!$clientModel->idExists($_GET['id'])) {
  header('Location: ?page=listClients');
  exit;
}

$client = $clientModel->findById($_GET['id']);
$tasks = $taskModel->findByClient($_GET['id']);
$contacts = $contactModel->findByClient($_GET['id']);
$purchases = $purchaseModel->findByClient($_GET['id']);

$workedHours = $taskModel->getTotalHours($client['id']);
$purchasedHours = $purchaseModel->getTotalHours($client['id']);
$remainingHours = $purchasedHours - $workedHours;
