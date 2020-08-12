<?php
include_once 'utilities.php';

/**
 * Errors
 */
error_reporting(E_ALL);
set_error_handler('myError');
set_exception_handler('myException');

/**
 * Session
 * session regenrate only during login 
 * sessja za zdefiniowaną obłsugąnłędów
 */
session_start();

/**
 * Autoloader
 */
spl_autoload_register('myAutoloader');


use app\core\App;
$app = new App();

?>