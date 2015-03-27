<?php

set_exception_handler('logger::exception_handler');
set_error_handler('logger::error_handler');

//set timezone
// date_default_timezone_set('Europe/London');

//site address
define('DIR','http://24.215.81.216/');

//database details ONLY NEEDED IF USING A DATABASE
define('DB_TYPE','mysql');
define('DB_HOST','localhost');
define('DB_NAME','skilzmatch');
define('DB_USER','root');
define('DB_PASS','changeme');
define('PREFIX','');

//set prefix for sessions
define('SESSION_PREFIX','');

//optionall create a constant for the name of the site
define('Skillzmatch','V1');

//set the default template
Session::set('template','default');
