<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if(!(isset($_SESSION['logCheck']) && $_SESSION['logCheck'] == 12345)){
    //redirect file code from OSU sessions lecture
    $filePath = explode('/', $_SERVER['PHP_SELF'], -1);
    $filePath = implode('/',$filePath);
    $redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
    header("Location: {$redirect}/login.php", true);
    die();
}
echo '<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Content 2</title>
</head>
<body>
<p>Hello and welcome to the content 2 page.
<p><a href="content1.php">Content 1</a>
</body></html>';
