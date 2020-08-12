<?php

namespace app\core;

use app\core\Model;
use app\core\models\Authentication;


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
       * @param string $class klasa lub metoda kontrolera, tak aby nie trzeba było sprawdzać URLa
       * @param arrray $params asocjacyjna tablica paramterów do wyświetlenia
       * @return void
       * 
       * Filtr akcji
       * Domyślnie includeje szablon strony, może wykonywac inne funkcje
       */
      public function before(string $class = '', array $params = [])
      {
            $a = 1;
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
            $globalMessage = 'global';
            include_once('../app/views/inc/footer.php');

            include_once('../app/views/inc/foot.php');
      }

      /**
       * Redirect to a different page
       *
       * @param string $url  The relative URL
       *
       * @return void
       */
      public function redirect($url)
      {
            header('Location: http://' . $_SERVER['HTTP_HOST'] . Config::ROOT_FOLDER . $url, true, 303);
            exit;
      }

      
    /**
     * Require the user to be logged in before giving access to the requested page.
     * Remember the requested page for later, then redirect to the login page.
     *
     * @return void
     */
      public function requiredLogin()
      {
            if (!Authentication::isLoggedIn()) {


                  Authentication::rememberedPage();

                  _echo("<p class='container red b'>Dostęp tylko dla zalogowanych użytkowników</p>");
                  _echo("<p class='container'> <a href='login'>Zaloguj się &rarr;</a></p>");
                  $this->after();
                  exit;
                  /**
                   * możemy zrobić także Authentication::redirect(600) i exit
                   * jeżeli w funkcji after ma się wykoywaćwazna logika - było by to pożądane
                   */
            }
      }
}
