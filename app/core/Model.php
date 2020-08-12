<?php

namespace app\core;

use app\core\interfaces\DadabaseSingletonInterface;

/**
 * Sigleton Class
 * https://refactoring.guru/pl/design-patterns/singleton/php/example
 */
class Model implements DadabaseSingletonInterface
{

      /**
       * The Singleton's constructor should always be private to prevent direct
       * construction calls with the `new` operator.
       */
      private function __construct()
      {
      }

      /**
       * Singletons should not be cloneable.
       */
      protected function __clone()
      {
      }


      /**
       * Get the PDO database connection
       *
       * @return mixed
       */
      protected static function getInstance()
      {
            static $db = null;
            // echo "<pre>var_dump \$db: ";
            // var_dump($db);
            // echo "</pre>";

            if ($db === null) {
                  $username = Config::DB_USER;
                  $password = Config::DB_PASSWORD;
                  $host = Config::DB_HOST;
                  $dbname = Config::DB_NAME;

                  try {

                        $db = new \PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', '' . $username . '', '' . $password . '');

                        //  ustawiają żądanie, aby wszelkie błędy zapytania raportowane były jako wyjątki.
                        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                        //  sql injection: 
                        $db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
                        $db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
                  } catch (\PDOException $e) {
                        echo $e->getMessage();
                        // exit;
                  }
            }
            return $db;
      }

      /**
       * @param string $query SQL Statement
       * @param array $params array of variables
       * @return array
       */
      public static function getRow(string $query, array $params = [])
      {
            try {
                  $db = static::getInstance();
                  $stmt = $db->prepare($query);
                  $stmt->execute($params);
                  $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                  return $result;
            } catch (\PDOException $e) {
                  throw new \Exception($e->getMessage());
            }
      }

      /**
       * @param string $query SQL Statement
       * @param array $params array of variables
       * @return array
       */
      public static function getRows( string $query, array $params = [])
      {
            try {
                  $db = static::getInstance();
                  $stmt = $db->prepare($query);
                  $stmt->execute($params);
                  $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                  return $results;
            } catch (\PDOException $e) {
                  echo $e->getMessage();
            }
      }

      /**
       * @param string $query SQL Statement
       * @param array $params array of variables
       * @return array
       */
      public static function getObject(string $query, array $params = [])
      {
            try {
                  $db = static::getInstance();
                  $stmt = $db->prepare($query);
                  $stmt->setFetchMode(\PDO::FETCH_CLASS, get_called_class());
                  $stmt->execute($params);
                  $result = $stmt->fetch();
                  return $result;
            } catch (\PDOException $e) {
                  throw new \Exception($e->getMessage());
            }
      }

      /**
       * @param string $query SQL Statement
       * @param array $params array of variables
       * @return true if inserted
       */
      public static function insertRow( string $query, array $params = [])
      {
            try {
                  // $stmt = $this->database->prepare($query);
                  $stmt = static::getInstance()->prepare($query);
                  $stmt->execute($params);
                  return true;
            } catch (\PDOException $e) {
                  // if($this->isConnect) include_once('error_page.php');exit;
                  throw new \Exception($e->getMessage());
            }
      }


      /**
       * @param string $query SQL Statement
       * @param array $params array of variables
       * @return true if updated
       */
      public static function updateRow(string $query, array $params = [])
      {
            try {
                  if (static::insertRow($query, $params)) {
                        return true;
                  }
            } catch (\PDOException $e) {
                  throw new \Exception($e->getMessage());
            }
      }

      /**
       * @param string $query SQL Statement
       * @param array $params array of variables
       * @return void
       */
      public static function deleteRow(string $query, array $params = [])
      {
            self::insertRow($query, $params);
      }

     
}
