<?php

require("model/ContactModel.php");
$contactModel = new ContactModel();

if (!$contactModel->idExists($_GET['id'])) {
  header('Location: ?page=listClients');
  exit();
}

$contact = $contactModel->findById($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $contactModel->edit(
    $contact['id'],
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

    $error = $upload->uploadImage($_FILES['photo'], 'public/media/img/contactPhotos/' . $contact['id']);
  }

  header('Location: ?page=contact&id=' . $contact['id']);
  exit();
}
