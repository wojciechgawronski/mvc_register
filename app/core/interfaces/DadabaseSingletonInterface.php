<?php

namespace app\core\interfaces;

/**
 * 
 */
interface DadabaseSingletonInterface
{

      public static function getRow(string $query, array $params = []);

      public static function getRows(string $query, array $params = []);

      public static function deleteRow(string $query, array $params = []);

      public static function updateRow(string $query, array $params = []);

      public static function insertRow(string $query, array $params = []);
      
}