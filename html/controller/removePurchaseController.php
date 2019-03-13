<?php

require("model/PurchaseModel.php");

$purchaseModel = new PurchaseModel();

$purchase = $purchaseModel->findById($_GET['id']);

if ($purchaseModel->idExists($_GET['id'])) {
  $purchaseModel->remove($_GET['id']);
}

header('Location: ?page=client&id=' . $purchase['clientId']);
exit;
