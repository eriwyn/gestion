<?php

class Connection
{
    public function isConnected() {
      if (isset($_SESSION['user'])) {
        return true;
      } else {
        return false;
      }
    }

    public function connect($login, $password) {
      $db = new Database();

      $users = $db->query('SELECT * FROM users');

      foreach ($users as $user) {
	       if ($login == $user['login'] && password_verify($password, $user['password'])) {
           $_SESSION['user'] = $login;
           return true;
         }
      }
      
      return false;
    }

    public function disconnect() {
      session_destroy();
    }
}
