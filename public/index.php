<?php

define('APPLICATION_NAME', 'MajistiT');
define('APPLICATION_FOLDER_NAME', 'majistit');

/* make sure PHP below 5.3 will die here */
if( version_compare(PHP_VERSION, '5.3.0') < 0 ) {
    die("This project is compatible with PHP 5.3 or higher, your version is: " .
        PHP_VERSION);
}

/*
 * Majisti library folder's name. Will search recursively upright for the folder.
 * No forward nor ending slashes allowed
 */
define('MAJISTI_FOLDER_NAME', 'majisti-0.4.0alpha');

/* PHP parsers below 5.3.0 will understand this, but die in version compare */
require_once '../application/Loader.php';
call_user_func(APPLICATION_NAME . '\Application\Loader::load');
