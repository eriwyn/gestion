<?php

require('../library/Database.php');

require("../model/ClientModel.php");

$clientModel = new ClientModel();
$clients = $clientModel->searchByPage($_GET['search'], $_GET['page'], $_GET['orderField'], $_GET['isDesc']);

header('Content-Type: application/json');
echo json_encode($clients);
