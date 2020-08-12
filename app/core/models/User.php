<?php

namespace app\core\models;

use app\core\Model;

/**
 * 
 */
class User
{

      /**
       * Error messages - błędy podczas rejestracji nowego użytkownika
       *
       * @var array
       */
      public $errors = [];

      /**
       * Konstruktor dynammicznie, w pętli zainiciujwe wartości Użytkownika
       * w notacji klucz - waertość
       * przekazane z formularza SignIn.php
       *
       * @param array $data  Initial property values
       *
       * @return void
       */
      public function __construct(array $data = [])
      {
            foreach ($data as $key => $value) {
                  $this->$key = $value;
            };
      }

      /**
       * Save the user model with the current property values
       *Metoda weywoływana prze Controlelr Login
       * @return void
       */
      public function save()
      {

            $this->validate();

            if (empty($this->errors)) {

                  $password_hash = password_hash($this->password, PASSWORD_DEFAULT);

                  $sql = 'INSERT INTO users (name, email, password_hash) VALUES (?,?,?)';

                  return Model::insertRow($sql, ['mvc_register', $this->email, $password_hash]);
            }

            return false;
      }

      /**
       * Validate current property values, adding valiation error messages to the errors array property
       *
       * @return void
       */
      public function validate()
      {

            // email address
            if (filter_var($this->email, FILTER_VALIDATE_EMAIL) === false) {
                  $this->errors[] = 'Niepoprawny email';
            }

            if (self::emailExists($this->email)) {
                  $this->errors[] = 'Ten email już istnieje w bazie danych';
            }

            if (strlen($this->password) < 5) {
                  $this->errors[] = 'Hasło powinno mięć przynajmniej 5 znaków';
            }

            if (preg_match('/.*[a-z]+.*/i', $this->password) == 0) {
                  $this->errors[] = 'Hasło musi mieć przynajmniej jedną literę';
            }

            if (preg_match('/.*\d+.*/i', $this->password) == 0) {
                  $this->errors[] = 'Hasło musi mieć przynajmniej jedną cyfrę';
            }
            if ($this->confirmationNumber !== $this->verificationNumber) {
                  $this->errors[] = 'Nie podano poprawnego wyniku działania';
            }
      }

      /**
       * See if a user record already exists with the specified email
       *
       * @param string $email email address to search for
       *
       * @return boolean  True if a record already exists with the specified email, false otherwise
       */
      public static function emailExists(string $email)
      {
            // echo false === false // true
            return self::findByEmail($email) !== false;
      }

      /**
       * Find a user model by email address
       *
       * @param string $email email address to search for
       *
       * @return mixed User object if found, false otherwise
       */
      public static function findByEmail($email)
      {
            $sql = 'SELECT * FROM users WHERE email = ?';
            return Model::getObject($sql, [$email]);
      }

      /**
       * Authenticate a user by email and password.
       *
       * @param string $email email address
       * @param string $password password
       *
       * @return mixed  The user object or false if authentication fails
       */
      public static function authenticate($email, $password)
      {
            $user = static::findByEmail($email);

            if ($user) {
                  if (password_verify($password, $user->password_hash)) {
                        return $user;
                  }
            }

            return false;
      }

      /**
       * Find a user model by ID
       *
       * @param string $id The user ID
       *
       * @return mixed User object if found, false otherwise
       */
      public static function findByID(int $id)
      {
            $sql = 'SELECT * FROM users WHERE id = ?';

            return Model::getObject($sql, [$id]);

      }
}
