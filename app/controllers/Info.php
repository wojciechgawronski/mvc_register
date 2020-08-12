<?php

use app\core\View;
use app\core\Controller;
use app\helpers\FileManager;

/**
 * 
 */
class Info extends Controller
{

      /**
       * 
       */
      public function __construct()
      {
      }

      /**
       * 
       */
      public function index()
      {
            $this->before();
            
            View::renderView('info/index');

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
}