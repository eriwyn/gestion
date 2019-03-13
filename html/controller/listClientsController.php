<?php

require("model/ClientModel.php");

$clientModel = new ClientModel();

$clientNumber = $clientModel->count();
$clients = $clientModel->findByPage(1);
