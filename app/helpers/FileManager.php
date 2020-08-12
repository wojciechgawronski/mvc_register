<?php

namespace app\helpers;

class FileManager
{

      /**
       * 
       */
      public static function wyswietlKatalog($sciezka)
      {

            $dir = opendir($sciezka);

            echo "<ul class='small'>";
            while ($f = readdir($dir)) {

                  if (is_dir($sciezka . $f) && $f != '.' && $f != '..') {
                        echo "<li> <b>$f/</b>";
                        echo self::wyswietlKatalog($sciezka . $f . '/');
                        echo '</li>';
                  } else if (is_file($sciezka . $f)) {
                        echo '<li>';
                        echo $f;
                        echo '</li>';
                  }
            }

            echo '</ul>';

            closedir($dir);
      }

}
