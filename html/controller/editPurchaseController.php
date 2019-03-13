<?php

require("model/PurchaseModel.php");
$purchaseModel = new PurchaseModel();

if (!$purchaseModel->idExists($_GET['id'])) {
  header('Location: ?page=listClients');
  exit();
}

$purchase = $purchaseModel->findById($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $purchaseModel->edit(
    $purchase['id'],
    $_POST['hours'],
    $_POST['purchaseDate']
  );

  header('Location: ?page=purchase&id=' . $purchase['id']);
  exit();
}
