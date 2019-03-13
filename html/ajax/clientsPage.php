<?php

require('../library/Database.php');

require("../model/ClientModel.php");

$clientModel = new ClientModel();
$clients = $clientModel->searchByPage($_GET['string'], $_GET['page']);

header('Content-Type: application/json');
echo json_encode($clients);
