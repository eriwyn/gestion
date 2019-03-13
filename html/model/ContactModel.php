<?php

class ContactModel
{
    public function findAll() {
        $db = new Database();
        $contacts = $db->query("SELECT * FROM contacts");

        return $contacts;
    }

    public function findByClient($clientId) {
        $db = new Database();
        $contacts = $db->query("SELECT * FROM contacts WHERE clientId = ?", [
          $clientId
        ]);

        return $contacts;
    }

    public function findById($id) {
        $db = new Database();
        $contact = $db->queryOne("SELECT * FROM contacts WHERE id = ?", [
            $id
        ]);

        return $contact;
    }

    public function idExists($id) {
      $db = new Database();
      $contact = $db->queryOne("SELECT * FROM contacts WHERE id = ?", [
          $id
      ]);

      if ($contact) {
        return true;
      } else {
        return false;
      }
    }

    public function add($clientId, $lastName, $firstName, $address, $postalCode, $city, $country, $tel, $mail) {
            $db = new Database();
            return $db->execute('INSERT INTO contacts(lastName, firstName, address, postalCode, city, country, tel, mail, clientId) Values(?, ?, ?, ?, ?, ?, ?, ?, ?)', [
              $lastName,
              $firstName,
              $address,
              $postalCode,
              $city,
              $country,
              $tel,
              $mail,
              $clientId
            ]);
    }

    public function edit($id, $lastName, $firstName, $address, $postalCode, $city, $country, $tel, $mail) {
            $db = new Database();
            return $db->execute('UPDATE contacts SET lastName = ?, firstName = ?, address = ?, postalCode = ?, city = ?, country = ?, tel = ?, mail = ? WHERE id = ?', [
              $lastName,
              $firstName,
              $address,
              $postalCode,
              $city,
              $country,
              $tel,
              $mail,
              $id
            ]);
    }

    public function remove($id) {
      $db = new Database();
      $db->execute('DELETE FROM contacts WHERE id = ?', [
        $id
      ]);
    }
}
