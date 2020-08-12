<?php

use app\core\Controller;
use app\core\models\Authentication;
use app\core\View;

/**
 * kontrolery wczytywane są funkcją require - nie potrzebują namespaców
 * dziedziczą po głównym kontrolerze, potrzebują use
 */
class Home extends Controller
{
      public string $controller = __CLASS__;

      /**
       * 
       */
      public function __construct()
      {
            // exit('hej');
      }

      /**
       * 
       */
      public function index($name = '', $mood = '')
      {
            $params = [sanitizeString($name), sanitizeString($mood)];

            $this->before();

            View::renderView('home/index', [
                  'name' => $name,
                  'mood' => $mood,
                  'user' => Authentication::getUser()
            ], $this->controller);

            $this->after();
      }

      /**
       * 
       */
      public function before($className = __CLASS__, $params = [])
      {
            include_once '../app/models/header.php';

            parent::before($className, $header);
      }


      /**
       * 
       */
      public function after()
      {
            parent::after();
      }
}
