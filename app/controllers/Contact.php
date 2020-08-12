<?php

use app\core\View;
use app\core\Controller;

/**
 * 
 */
class Contact extends Controller
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

            View::renderView('contact/index');

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
            include_once '../app/views/inc/footer.php';

            include_once '../app/views/inc/foot.php';
      }
}
