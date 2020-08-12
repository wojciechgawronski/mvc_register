<?php

namespace app\core\models;

use app\core\Config;

/**
 * UWIERZYTELNIENIE
 * to jednoznaczna weryfikacja tożsamości danego użytkownika np. za pomocą hasła czy bardziej zaawansowanych metod takich jak dowód z wiedzą zerową.
 * 
 * Autoryzacja polega na sprawdzaniu, czy dana operacja dla danego użytkownika 
 * jest dozwolona. Autoryzacja ma miejsce po pomyślnym uwierzytelnieniu.
 */
class Authentication
{
      /**
       * 
       */
      public static function login($user)
      {

            session_regenerate_id(true);

            $_SESSION['user_id'] = $user->id;

            $_SESSION['user_email'] = $user->email;
      }

      /**
       * 
       */
      public static function destrySession()
      {
            // Unset all of the session variables.
            $_SESSION = array();

            // If it's desired to kill the session, also delete the session cookie.
            // Note: This will destroy the session, and not just the session data!
            if (ini_get("session.use_cookies")) {
                  $params = session_get_cookie_params();
                  setcookie(
                        session_name(),
                        '',
                        time() - 42000,
                        $params["path"],
                        $params["domain"],
                        $params["secure"],
                        $params["httponly"]
                  );
            }

            // Finally, destroy the session.
            session_destroy();
      }

      /**
       * Redundancja, mtoda self::getUser() tobi praktycznie to samo
       * @return boolean
       */
      public static function isLoggedIn()
      {
            return isset($_SESSION['user_id']);
      }

      /**
       * Zapamiętaj wybraną akcję, np. gdy jest niedostępna 
       * i wymaga autoryzacji
       */
      public static function rememberedPage()
      {

            $_SESSION['return_to'] = str_replace(Config::ROOT_FOLDER, '', $_SERVER['REQUEST_URI']);
      }

      /**
       * Metoda wylptzystywaa podczas logowania 
       * Get the originally-requested page to return to after requiring login, or default to the homepage
       *
       * @return void
       */
      public static function getReturnToPage()
      {
            return $_SESSION['return_to'] ?? '';
      }

      /**
       * Metoda przyda się do wyswietlanai informacji na stronie o użytkowniku
       * Get the current logged-in user, from the session or the remember-me cookie
       *
       * @return mixed The user model or null if not logged in
       */
      public static function getUser()
      {
            if (isset($_SESSION['user_id'])) {
                  return User::findByID($_SESSION['user_id']);
            }
      }
}
