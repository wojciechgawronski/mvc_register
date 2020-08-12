<?php

namespace app\core\models;

use app\core\Controller;

/**
 * Kasy dziedziczące będa miały zaimplementowany filtr akcji, 
 * i będzie oboewązywał we wszystkich metodach
 * Authenticated base controller
 *
 */
abstract class Authenticated extends Controller
{
      /**
       * Require the user to be authenticated before giving access to all methods in the controller
       *
       * @return void
       */
      public function before(string $class = '', array $params = [])
      {
            $this->requiredLogin();
            parent::before(__CLASS__, $params = []);
      }
}
