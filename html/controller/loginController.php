<?php

$wrongLogin = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($connection->connect($_POST['username'], $_POST['password'])) {
    header('Location: ?page=listClients');
  } else {
    $wrongLogin = true;
  }
}
