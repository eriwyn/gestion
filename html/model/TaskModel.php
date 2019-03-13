<?php

class TaskModel
{
    public function findAll() {
        $db = new Database();
        $tasks = $db->query("SELECT * FROM tasks");

        return $tasks;
    }

    public function findByClient($clientId) {
        $db = new Database();
        $tasks = $db->query("SELECT tasks.* FROM tasks INNER JOIN purchases ON tasks.purchaseId = purchases.id WHERE purchases.clientId=?", [
          $clientId
        ]);

        return $tasks;
    }

    public function findByPurchase($purchaseId) {
        $db = new Database();
        $tasks = $db->query("SELECT * FROM tasks WHERE purchaseId=?", [
          $purchaseId
        ]);

        return $tasks;
    }

    public function findById($id) {
        $db = new Database();
        $task = $db->queryOne("SELECT * FROM tasks WHERE id = ?", [
            $id
        ]);

        return $task;
    }

    public function getClientId($id) {
      $db = new Database;
      $clientId = $db->queryOne('SELECT clientId FROM tasks INNER JOIN purchases ON tasks.purchaseId = purchases.id WHERE tasks.id = ?', [
        $id
      ])['clientId'];

      return $clientId;
    }

    public function idExists($id) {
      $db = new Database();
      $task = $db->queryOne("SELECT * FROM tasks WHERE id = ?", [
          $id
      ]);

      if ($task) {
        return true;
      } else {
        return false;
      }
    }

    public function add($purchaseId, $name, $detail) {
            $db = new Database();
            return $db->execute('INSERT INTO tasks(name, detail, purchaseId, creationDate, duration, status) Values(?, ?, ?, NOW(), 0, \'paused\')',[
              $name,
              $detail,
              $purchaseId
            ]);
    }

    public function edit($id, $name, $detail) {
            $db = new Database();
            return $db->execute('UPDATE tasks SET name = ?, detail = ? WHERE id = ?', [
              $name,
              $detail,
              $id
            ]);
    }

    public function remove($id) {
      $db = new Database();
      $db->execute('DELETE FROM tasks WHERE id = ?', [
        $id
      ]);
    }

    public function play($id) {
      $db = new Database();
      $db->execute('UPDATE tasks SET status = ?, beginningDate = NOW() WHERE id = ?', [
        'pending',
        $id
      ]);
    }

    public function pause($id) {
      $db = new Database();
      $db->execute('UPDATE tasks SET status = ?, duration = duration + TIMESTAMPDIFF(MINUTE, beginningDate, NOW()) WHERE id = ?', [
        'paused',
        $id
      ]);
    }

    public function end($id) {
      $db = new Database();
      $db->execute('UPDATE tasks SET status = ? WHERE id = ?', [
        'ended',
        $id
      ]);
    }

    public function getTotalHours($clientId) {
      $db = new Database();
      $totalHours = 0 + $db->queryOne('SELECT SUM(duration) AS totalHours FROM tasks INNER JOIN purchases ON tasks.purchaseId = purchases.id WHERE clientId = ?', [$clientId])['totalHours'];

      return $totalHours;
    }

    public function getTotalHoursByPurchase($purchaseId) {
      $db = new Database();
      $totalHours = 0 + $db->queryOne('SELECT SUM(duration) AS totalHours FROM tasks WHERE purchaseId = ?', [$purchaseId])['totalHours'];

      return $totalHours;
    }
}
