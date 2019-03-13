<?php

require('../library/Database.php');

require("../model/ClientModel.php");

$clientModel = new ClientModel();
$clients = $clientModel->count($_GET['string']);

header('Content-Type: application/json');
echo json_encode($clients);
