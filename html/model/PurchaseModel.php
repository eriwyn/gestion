<?php

class PurchaseModel
{
    public function findAll() {
        $db = new Database();
        $purchases = $db->query("SELECT * FROM purchases");

        return $purchases;
    }

    public function findByClient($clientId) {
        $db = new Database();
        $purchases = $db->query("SELECT * FROM purchases WHERE clientId = ?", [
          $clientId
        ]);

        return $purchases;
    }

    public function findUncompletedByClient($clientId) {
        $db = new Database();
        $purchases = $db->query("SELECT * FROM purchases WHERE clientId = ? AND remainingHours > 0", [
          $clientId
        ]);

        return $purchases;
    }

    public function findById($id) {
        $db = new Database();
        $purchase = $db->queryOne("SELECT * FROM purchases WHERE id = ?", [
            $id
        ]);

        return $purchase;
    }

    public function idExists($id) {
      $db = new Database();
      $purchase = $db->queryOne("SELECT * FROM purchases WHERE id = ?", [
          $id
      ]);

      if ($purchase) {
        return true;
      } else {
        return false;
      }
    }

    public function add($clientId, $name, $description,  $hours, $purchaseDate) {
            $db = new Database();
            return $db->execute('INSERT INTO purchases(name, description, purchasedHours, remainingHours, purchaseDate, clientId) Values(?, ?, ?, ?, ?, ?)', [
              $name,
              $description,
              $hours,
              $hours,
              $purchaseDate,
              $clientId
            ]);
    }

    public function edit($id, $hours, $purchaseDate) {
            $db = new Database();
            return $db->execute('UPDATE purchases SET purchasedHours = ?, purchaseDate = ? WHERE id = ?', [
              $hours,
              $purchaseDate,
              $id
            ]);
    }

    public function remove($id) {
      $db = new Database();
      $db->execute('DELETE FROM purchases WHERE id = ?', [
        $id
      ]);
    }

    public function getTotalHours($clientId) {
      $db = new Database();
      $totalHours = 0 + $db->queryOne('SELECT SUM(purchasedHours) AS totalHours FROM purchases WHERE clientId = ?', [$clientId])['totalHours'];

      return $totalHours;
    }

    public function updateRemainingHours($id, $hours) {
      $db = new Database();
      $db->execute('UPDATE purchases SET remainingHours = purchasedHours - ? WHERE id = ?', [
          $hours,
          $id
      ]);
    }
}
