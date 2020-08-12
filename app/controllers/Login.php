<?php

use app\core\View;
use app\core\Controller;
use app\core\models\Authentication;
use app\core\models\User;

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
       * Show view signin.php
       */
      public function signUp()
      {
            $this->before(__FUNCTION__, $params = []);

            View::renderView('login/signup');

            $this->after();

            echo "<script src='js/signin.js'></script>";
      }

      /**
       * 
       */
      public function signupUser()
      {
            // powinno się uciekać od superglobalmych w aplikacji
            // oraz delegoeać model do zadań
            // _print($_POST);
            if (isset($_POST) && !empty($_POST)) {
                  $user = new User($_POST);

                  if ($user->save()) {

                        $this->redirect('login/signupSuccess');
                  } else {

                        $this->before('signup', $params = []);

                        View::renderView('login/signup', ['user' => $user]);
                        // _print($user->errors);
                        $this->after();

                        echo "<script src='js/signin.js'></script>";
                  }
            } else {
                  $this->signUp();
            }
      }

      /**
       * 
       */
      public function signupSuccess()
      {

            View::renderView('login/signupSuccess');
      }

      /**
       * Render View Login.php
       */
      public function log_in($email = '')
      {
            $this->before(__FUNCTION__, $params = []);

            View::renderView('login/login', ['email' => $email]);

            $this->after();

            echo "<script src='js/login.js'></script>";
      }

      /**
       * 
       */
      public function loginAction()
      {
            // $user = User::findByEmail($_POST['email']);
            $user = User::authenticate($_POST['email'], $_POST['password']);
            if ($user) {
                 
                  Authentication::login($user);

                  $this->redirect(Authentication::getReturnToPage());

            } else {
                  $this->log_in($_POST['email']);

                  // View::renderView('login/login', ['email' => $_POST['email']]);
            }
      }

      public function before($className = '', $params = [])
      {
            include_once '../app/models/header.php';

            parent::before($className, $header);
      }

      /**
       * @param string $email
       * @return bool return false if email exists in DB  true otherwiese
       */
      public function validateEmail($email)
      {
            $is_valid = !User::emailExists($email);

            header('Content-Type: application/json');

            echo json_encode($is_valid);
      }

      public function logout()
      {
            Authentication::destrySession();

            $this->redirect('');
      }
}
