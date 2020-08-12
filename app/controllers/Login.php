<?php

use app\core\Controller;
use app\core\View;

/**
 * 
 */
class Login extends Controller
{

      public function __construct()
      {
      }

      /**
       * 
       */
      public function index()
      {
            $this->log_in();
      }

      /**
       * 
       */
      public function sign_in()
      {
            $this->before('sign_in', $params = []);

            View::renderView('login/signin');

            $this->after();
      }

      /**
       * 
       */
      public function log_in()
      {
            $this->before('log_in', $params = []);
            View::renderView('login/login');
            $this->after();
      }

      public function before($className = '', $params = [])
      {
            include_once '../app/models/header.php';

            parent::before($className, $header);
      }
}
