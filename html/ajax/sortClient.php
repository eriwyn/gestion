<?php

require('../library/Database.php');

require("../model/ClientModel.php");

$clientModel = new ClientModel();
$clients = $clientModel->searchByPage($_GET['string'], 1, $_GET['id']);

header('Content-Type: application/json');
echo json_encode($clients);
