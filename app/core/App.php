<?php

namespace app\core;

class App
{

      /**
       * @param string $controller
       * Defaultowy Kontroller
       */
      protected $controller = 'home';

      /**
       * @param string $method 
       * Defaultowa akcja
       */
      protected $method = 'index';

      /**
       * @param array $params
       * parametry akcji, eg.: home/index/param1/param2/
       */
      protected $params = [];

      public function __construct()
      {
            $url = $this->parseUrl();

            /**
             * Pierwszy parametr w URL - Controller
             */
            if ($url && file_exists('../app/controllers/' . ucfirst($url[0])  . '.php')) {
                  $this->controller = ucfirst($url[0]);
                  unset($url[0]);
            } else if ($url) {
                  // _echo("Controller <b>" . $url[0] . "</b> nie został znaleziony", 'red small');
                  header("HTTP/1.0 404 Not Found");
                  View::renderError(404, "Controller <b>" . $url[0] . "</b> nie został znaleziony");
                  exit;
            }

            require_once '../app/controllers/' . ucfirst($this->controller) . '.php';

            /**
             * Tworzenie instancji kontrolera
             * Defaultowo home controller
             * Jeśli nie ma kontrolera to także
             */

            $this->controller = new $this->controller;

            /**
             * Drugi paramter w URL
             */
            if (isset($url[1])) {
                  if (method_exists($this->controller, $url[1])) {
                        $this->method = $url[1];
                        unset($url[1]);
                  }
                  else{
                        /**
                         * Gdy nie ma zadeklarowanej akcji z URL (a kontroler istnieje) odpalamy index jako default
                         * Oczwiście przed metodą index odpalany jest konstruktor w Kontrolerze
                         * Mmożemy zdefiniowac obsługę błędu dla calłej aplikacji:
                         */
                        // $classname = get_class($this->controller);
                        // _echo("Method <b>{$url[1]}</b> in controller <b>{$classname}</b> dont exists", 'red b');
                        // View::renderError(600, "Method <b>{$url[1]}</b> in controller <b>{$classname}</b> dont exists");
                  }
            }

            $this->params = $url ? array_values($url) : [];

            /**
             * automatycznie wywoływana funcja
             */
      
            if (method_exists( $this->controller, $this->method)) {
                  call_user_func_array([$this->controller, $this->method], $this->params);
            }
            else{
                  // _echo("Brak metody: {$this->method}", 'red b');
                  View::renderError(600, "Brak metody: <b>{$this->method}</b>");
            }

            // _print($url, 'green');
            // _print($this->controller);
            // _print(get_class($this->controller));
            // _print($this->params, 'orange');
            // _print($this->method);
      }

      /**
       * @return array if url exists null otherweise 
       */
      public function parseUrl()
      {
            if (isset($_GET['url'])) {
                  $url = $_GET['url'];
                  $url = rtrim($url, '/');
                  $url = str_replace('public/', '', $url);
                  $url = filter_var($url, FILTER_SANITIZE_URL);
                  $url = explode('/', $url);
                  return $url;
            }
      }
}
