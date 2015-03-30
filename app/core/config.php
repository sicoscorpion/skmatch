<?php

set_exception_handler('logger::exception_handler');
set_error_handler('logger::error_handler');

//set timezone
// date_default_timezone_set('Europe/London');

//site address
define('DIR','http://skilzmatch.acadiau.ca/');

//database details ONLY NEEDED IF USING A DATABASE
define('DB_TYPE','mysql');
define('DB_HOST','localhost');
define('DB_NAME','skilzmatch');
define('DB_USER','skilzuser');
define('DB_PASS','08yudegv6t7r');
define('PREFIX','');

//set prefix for sessions
define('SESSION_PREFIX','');

//optionall create a constant for the name of the site
define('Skillzmatch','V1');

//set the default template
Session::set('template','default');
