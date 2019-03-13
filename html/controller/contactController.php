<?php

require("model/ContactModel.php");

$contactModel = new contactModel();

$contact = $contactModel->findById($_GET['id']);
