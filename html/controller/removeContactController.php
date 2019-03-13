<?php

require("model/ContactModel.php");

$contactModel = new ContactModel();

$contact = $contactModel->findById($_GET['id']);

if ($contactModel->idExists($_GET['id'])) {
  $contactModel->remove($_GET['id']);
}

header('Location: ?page=client&id=' . $contact['clientId']);
exit;
