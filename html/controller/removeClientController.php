<?php

require("model/ClientModel.php");

$clientModel = new ClientModel();

if ($clientModel->idExists($_GET['id'])) {
  $clientModel->remove($_GET['id']);
}

header('Location: ?page=listClients');
exit;
