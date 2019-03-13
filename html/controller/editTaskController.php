<?php

require("model/TaskModel.php");
$taskModel = new TaskModel();

if (!$taskModel->idExists($_GET['id'])) {
  header('Location: ?page=listClients');
  exit();
}

$task = $taskModel->findById($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $taskModel->edit(
    $task['id'],
    $_POST['name'],
    $_POST['description']
  );

  header('Location: ?page=task&id=' . $task['id']);
  exit();
}
