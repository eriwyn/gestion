<?php

class Database {
  //Properties
  private $db;

  //Constructor
  public function __construct() {
    $this->db = new PDO("mysql:host=mysql;dbname=demo_gestion;charset=utf8", "demo", "demo", [
       PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
       PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
  }

  private function getPdoType($value) {
      switch (gettype($value)) {
        case 'boolean':
          $pdoType = PDO::PARAM_BOOL;
          break;
        case 'integer':
          $pdoType = PDO::PARAM_INT;
          break;
        case 'string':
          $pdoType = PDO::PARAM_STR;
          break;
        default:
          $pdoType = PDO::PARAM_NULL;
          break;
      }

      return $pdoType;
  }

  public function query($sql, array $values = array()) {
    $query = $this->db->prepare($sql);

    foreach ($values as $key => $value) {
      $pdoType = $this->getPdoType($value);
      $query->bindValue($key+1, $value, $pdoType);
    }

    $query->execute();
    return $query->fetchAll();
  }

  public function queryOne($sql, array $values = array()) {
    $query = $this->db->prepare($sql);

    foreach ($values as $key => $value) {
      $pdoType = $this->getPdoType($value);
      $query->bindValue($key+1, $value, $pdoType);
    }

    $query->execute();
    return $query->fetch();
  }

  public function execute($sql, array $values = array()) {
    $query = $this->db->prepare($sql);

    foreach ($values as $key => $value) {
      $pdoType = $this->getPdoType($value);
      $query->bindValue($key+1, $value, $pdoType);
    }

    $query->execute();
    return $this->db->lastInsertId();
  }
}
