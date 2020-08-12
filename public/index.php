<?php
include_once 'utilities.php';

/**
 * Errors
 */
error_reporting(E_ALL);
set_error_handler('myError');
set_exception_handler('myException');

/**
 * Autoloader
 */
spl_autoload_register('myAutoloader');


use app\core\App;
$app = new App();

?>