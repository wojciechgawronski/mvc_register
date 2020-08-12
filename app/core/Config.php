<?php

namespace app\core;

/**
 * Konfiguracja aplikacji
 */
class Config
{

    /**
     * Database host
     * @var string
     */
    const DB_HOST = '';

    /**
     * Database name
     * @var string
     */
    const DB_NAME = '';

    /**
     * Database user
     * @var string
     */
    const DB_USER = '';

    /**
     * Database password
     * @var string
     */
    const DB_PASSWORD = '';

    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    const SHOW_ERRORS = false;

    /**
     * Main folder in serwer
     * @var string
     */
    const ROOT_FOLDER = '';

    /**
     * Base href into views/inc/head.php
     * @var string
     */
    const BASE_HREF = '';

    /**
     * Secret key for hashing
     * https://randomkeygen.com/
     * @var boolean
     */
    const SECRET_KEY = '';

    /**
     * @var string
     */
    const SALT = '';
}
