<?php

function _print($var, $color = '')
{
      echo "<pre style='border-color: $color'>";
      print_r($var);
      echo "</pre>";
}

function _dump($var)
{
      echo "<pre>";
      var_dump($var);
      echo "</pre>";
}

function _echo($var, $class = '')
{
      echo "<p class='$class'>";
      echo $var;
      echo "</p>";
}

function sanitizeString($var)
{
      $var = stripslashes($var);
      $var = strip_tags($var);
      $var = htmlentities($var);
      return $var;
}

function myException($e)
{
      $message = $e->getMessage();
      $code = $e->getCode();
      $file = $e->getFile();
      $fileName = basename($file);
      $line = $e->getLine();
      $today = date("Y.m.d");
      $time = date("H:i:s");
      echo "<style>body{background: #222;color: #fff;}</style>";
      echo "<link rel='stylesheet' href='css/base.css'>";
      echo "<p style='border: 1px solid red;padding: 8px;'><b>Exception:</b> ";
      echo "Wiadomość: $message";
      echo "<br><span style='color:darkgray'>Linia: <b>$line</b>, plik: <b>$fileName</b>, <br> data: <b>$today</b>, godzina: <b>$time</b>.";
      echo "</span></p>";

      // log($exception->getMessage());
      // developer email
}
function myError($errno, $errstr, $errfile, $errline)
{
      $errfile = basename($errfile);

      // if (Config::showErrors) {
      if (1) {
            echo "<link rel='stylesheet' href='css/base.css'>";
            echo "<p style='border: 1px solid darkgray;padding: 8px;'><b class='orange'>Error</b> / Błąd: <b><i> $errstr</i></b>";
            echo "<br><span style='color: gray'>Plik: $errfile, Linia: $errline";
            echo "</span></p>";
      } else {
            echo "<p style='border: 1px solid darkgray;padding: 8px;'>Przepaszamy, wystąpił nieoczekiwany błąd!</p>";
      }

      // log($exception->getMessage());
      // developer email
}

function myAutoloader($class){
      $root = dirname(__DIR__);
      $class = $root . '/' . $class . '.php';
      $class = str_replace('\\', '/', $class);
      // echo($class);
      if(file_exists($class)){
            require $class;
      }
      else{
            throw new Exception("Brak pliku: $class");
      }
}

?>