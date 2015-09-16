<?php

namespace Boilerplate;

use PDO;

class Database extends PDO {
  private $database, $host, $user, $pass;
  private $attributes = [];

  public function __construct () {
    $this->database   = 'slim_boilerplate';  // Change
    $this->user       = 'root';              // Change
    $this->pass       = 'root';              // Change
    $this->host       = 'mysql:host=localhost;dbname=' . $this->database . ';';
    $this->attributes = [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    ];

    parent::__construct($this->host, $this->user, $this->pass, $this->attributes);
  }

  public function getUsernames () {
    $sql = 'SELECT user_name FROM users';

    try {
      $stmt = $this->prepare($sql);
      $stmt->execute();

      $data = $stmt->fetchAll();
      print_r($data);
    } catch (PDOException $exception) {
      return $exception;
    }
  }
}
