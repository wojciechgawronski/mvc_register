<?php

namespace app\core\interfaces;

/**
 * 
 */
interface ModelInterface
{
      public function getRow(string $query, array $params = []);

      public function getRows(string $query, array $params = []);

      public function updateRow(string $query, array $params = []);

      public function deleteRow(string $query, array $params = []);

      public function insertRow(string $query, array $params = []);

}
