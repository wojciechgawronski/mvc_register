<?php

namespace app\core;

class View
{

      /**
       * @param string $view eg. home/index (home - controller name, index - method(action) in controller)
       * @param array $data - sholud be associative array
       * @return void render View
       * 
       */
      public static function renderView(string $view, array $data = [])
      {

            $view = explode('/', $view);
            $view[0] = ucfirst($view[0]);
            $view = implode('/', $view);
            $file = "../app/views/" . $view . ".php";
            
            // konwertuje klucze tablic na nazwy zmiennych i wartości tablic na wartości zmiennych. 
            extract($data, EXTR_SKIP);

            if (is_readable($file)) {

                  require_once $file;
            } else {
                  // echo "$file not found";
                  throw new \Exception("$file not found");
            }
      }

      /**
       * @param int $errorNumber View number from directory Errors
       * @return void
       */
      public static  function renderError(int $errorNumber, $message = '')
      {
            $file = "../app/views/Errors/$errorNumber.php";
            if (file_exists($file)) require_once $file;
            exit;
      }
}
