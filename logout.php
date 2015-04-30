<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Needed info to start session before destroying it to get logout.php to work correctly
// http://stackoverflow.com/questions/17564795/destroy-a-php-session-on-clicking-a-link
session_start();
session_destroy();
//header path code taken from OSU lecture
$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
$filePath = implode('/',$filePath);
$redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
header("Location: {$redirect}/login.php", true);
/**
 * Created by PhpStorm.
 * User: Jeff
 * Date: 4/30/2015
 * Time: 1:37 PM
 */