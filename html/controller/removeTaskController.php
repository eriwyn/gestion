<?php

require("model/TaskModel.php");

$taskModel = new taskModel();

$task = $taskModel->findById($_GET['id']);

if ($taskModel->idExists($_GET['id'])) {
  $taskModel->remove($_GET['id']);
}

header('Location: ?page=client&id=' . $task['clientId']);
exit;
