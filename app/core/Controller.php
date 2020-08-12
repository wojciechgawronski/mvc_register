<?php

namespace app\core;

use app\core\Model;


class Controller extends Model
{
      public string $controllerName;
      public $db;

      /**
       * @param string $ontrollerName param from App.php, usefull during render View - escape from URL parameters
       */
      public function __construct($controllerName)
      {
           $this->controllerName = $controllerName;
      }

      /**
       * @param string $class clasa kontrolera, tak aby nie trzeba było sprawdzać URLa
       * @param arrray $params asocjacyjna tablica paramterów do wyświetlenia
       * @return void
       * 
       * Filtr akcji
       * Domyślnie includeje szablon strony,
       */
      public function before($class = '', $params = [])
      {
            include_once('../app/views/inc/head.php');

            include_once('../app/views/inc/nav.php');
            
            include_once('../app/views/inc/header.php');
      }

      /**
       * @return void
       * Filtr acji
       */
      public function after()
      {
            include_once('../app/views/inc/footer.php');
            
            include_once('../app/views/inc/foot.php');
      }

     
}
