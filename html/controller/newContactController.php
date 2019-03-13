<?php

require("model/ContactModel.php");
require("model/ClientModel.php");

$contactModel = new ContactModel();
$clientModel = new ClientModel();

if (!$clientModel->idExists($_GET['client_id'])) {
  header('Location: ?page=listClients');
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $contactId = $contactModel->add(
    $_GET['client_id'],
    $_POST['name'],
    $_POST['firstName'],
    $_POST['address'],
    $_POST['postal'],
    $_POST['city'],
    $_POST['country'],
    $_POST['tel'],
    $_POST['mail']
  );

  if (isset($_FILES['photo'])) {
    $upload = new Upload();

    $error = $upload->uploadImage($_FILES['photo'], 'public/media/img/contactPhotos/' . $contactId);
  }

  header('Location: ?page=client&id=' . $_GET['client_id']);
  exit();
}
