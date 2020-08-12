<?php

// require_once 'Config.php';
namespace app\core;

use app\core\Config;
use app\core\interfaces\ModelInterface;

class Database implements ModelInterface
{
      public $isConnect;
      protected $database;

      public function __construct(
            $username = Config::DB_USER, 
            $password = Config::DB_PASSWORD, 
            $host = Config::DB_HOST, 
            $dbname = Config::DB_NAME, 
            $options = [])
      {
            $this->isConnect = true;

            try {

                  $this->database = new \PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', '' . $username . '', '' . $password . '');
                  
                  //  ustawiają żądanie, aby wszelkie błędy zapytania raportowane były jako wyjątki.
                  $this->database->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                  //  sql injection: 
                  $this->database->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
                  $this->database->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            } catch (\PDOException $e) {
                  // include_once('views/error_page.php'); exit();
                  $this->isConnect = false;
                  throw new \Exception($e->getMessage());
            }
      }

      public function disconnect()
      {
            $this->database = NULL;
            $this->isConnect = false;
      }

      public function getRow($query, $params = [])
      {
            try {
                  $stmt = $this->database->prepare($query);
                  $stmt->execute($params);
                  return $stmt->fetch();
            } catch (\PDOException $e) {
                  throw new \Exception($e->getMessage());
            }
      }

      public function getRows($query, $params = [])
      {
            try {
                  
                  $stmt = $this->database->prepare($query);
                  $stmt->execute($params);
                  return $stmt->fetchAll();
            } catch (\PDOException $e) {
                  throw new \Exception($e->getMessage());
            }
      }

      public function insertRow($query, $params = [])
      {
            try {
                  $stmt = $this->database->prepare($query);
                  $stmt->execute($params);
                  return true;
            } catch (\PDOException $e) {
                  // if($this->isConnect) include_once('error_page.php');exit;
                  throw new \Exception($e->getMessage());
            }
      }


      public function updateRow($query, $params = [])
      {
            try {
                  if ($this->insertRow($query, $params)) {
                        return true;
                  }
            } catch (\PDOException $e) {
                  throw new \Exception($e->getMessage());
            }
      }

      public function deleteRow($query, $params = [])
      {
            $this->insertRow($query, $params);
      }
}
$db = new Model();