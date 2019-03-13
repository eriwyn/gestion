<?php

require("model/ClientModel.php");
require("model/TaskModel.php");
require("model/PurchaseModel.php");

$clientModel = new ClientModel();
$taskModel = new TaskModel();
$purchaseModel = new PurchaseModel();

if (!$taskModel->idExists($_GET['id'])) {
  header('Location: ?page=listClients');
  exit;
}

$clientId = $taskModel->getClientId($_GET['id']);
$client = $clientModel->findById($clientId);
$task = $taskModel->findById($_GET['id']);

if (isset($_GET['action'])) {
  switch ($_GET['action']) {
    case 'play':
      $taskModel->play($task['id']);
      break;
    case 'pause':
      $taskModel->pause($task['id']);
      $purchaseModel->updateRemainingHours($task['purchaseId'], $taskModel->getTotalHoursByPurchase($task['purchaseId']));
      break;
    case 'end':
      $taskModel->end($task['id']);
      break;
  }
  header('Location: ?page=task&id=' . $task['id']);
}
