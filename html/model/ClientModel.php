<?php

class ClientModel
{
    public function findAll() {
        $db = new Database();
        $clients = $db->query("SELECT * FROM clients");

        return $clients;
    }

    public function findById($id) {
        $db = new Database();
        $client = $db->queryOne("SELECT * FROM clients WHERE id = ?", [
            $id
        ]);

        return $client;
    }

    public function findByPage($page, $sort = "name")
    {
      $fields = [
        'name',
        'mail',
        'tel'
      ];

      $offset = ($page-1)*10;

      $db = new Database();

      if (in_array($sort, $fields)) {
        $clients = $db->query("SELECT * FROM clients ORDER BY $sort LIMIT 10 OFFSET ?", [
          $offset
        ]);

        return $clients;
      }

      return false;
    }

    public function searchByPage($string, $page, $sort = "name", $isDesc) {
      $orderFields = [
        'name',
        'mail',
        'tel'
      ];

      $offset = ($page-1)*10;

      $db = new Database();

      if (in_array($sort, $orderFields)) {
        if ($isDesc == "true") {
          $clients = $db->query("SELECT * FROM clients WHERE name LIKE CONCAT('%', ?, '%') ORDER BY $sort DESC LIMIT 10 OFFSET ?", [
            $string,
            $offset
          ]);
        } else {
          $clients = $db->query("SELECT * FROM clients WHERE name LIKE CONCAT('%', ?, '%') ORDER BY $sort LIMIT 10 OFFSET ?", [
            $string,
            $offset
          ]);
        }

        return $clients;
      }

      return false;
    }

    function count($string = "") {
      $db = new Database();
      $clientNumber = $db->queryOne("SELECT COUNT(*) FROM clients WHERE name LIKE CONCAT('%', ?, '%')", [
        $string
      ])["COUNT(*)"];

      return $clientNumber;
    }

    public function idExists($id) {
      $db = new Database();
      $client = $db->queryOne("SELECT * FROM clients WHERE id = ?", [
          $id
      ]);

      if ($client) {
        return true;
      } else {
        return false;
      }
    }

    public function add($name, $address, $city, $postalCode, $country, $tel, $mail) {
            $db = new Database();
            return $db->execute('INSERT INTO clients(name, address, city, postalCode, country, tel, mail) Values(?, ?, ?, ?, ?, ?, ?)',
                [ $name,
                  $address,
                  $city,
                  $postalCode,
                  $country,
                  $tel,
                  $mail
                ]);
    }

    public function edit($id, $name, $address, $city, $postalCode, $country, $tel, $mail) {
            $db = new Database();
            return $db->execute('UPDATE clients SET name = ?, address = ?, city = ?, postalCode = ?, country = ?, tel = ?, mail = ? WHERE id = ?',
                [ $name,
                  $address,
                  $city,
                  $postalCode,
                  $country,
                  $tel,
                  $mail,
                  $id
                ]);
    }

    public function remove($id) {
      $db = new Database();
      $db->execute('DELETE FROM clients WHERE id = ?', [
        $id
      ]);
    }
}
