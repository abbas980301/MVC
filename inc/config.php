<?php

define('HTTP_HOST', $_SERVER['HTTP_HOST']);
define('DIR_NAME', str_replace('\\', '/', dirname(__dir__)));
define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);
define('PARENT_FOLDER_NAME', str_replace(DOCUMENT_ROOT, '', DIR_NAME));

define('APP_URL', 'http://' . HTTP_HOST . PARENT_FOLDER_NAME);

$requestUrl =  $_SERVER['REQUEST_URI'];
$requestUrl =  str_replace(PARENT_FOLDER_NAME, '', $requestUrl);
$requestUrl =  trim($requestUrl, '/');
$requestUrl =  strtolower($requestUrl);
if (empty($requestUrl))
    $requestUrl = 'ROOT';
// Omit parent folder name from requested url
define('REQUEST_URL', urldecode($requestUrl));

