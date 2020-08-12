<?php

use app\core\View;
use app\core\Controller;
use app\core\models\Authenticated;
use app\core\models\Authentication;

/**
 * 
 */
// kalsa Authenticated ma filtryu akcji dostępne dla wszystkich metod
 // class Contact extends Authenticated
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

            $this->requiredLogin();

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
            
            // filtr akcji: autemtykacja dostępu
            // $this->requiredLogin();

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
