<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
//session related variable and function calls
//reference from OSU's lectures and lecture code

echo '<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Content 1</title>
</head>
<body>';

function redirect(){
    $filePath = explode('/', $_SERVER['PHP_SELF'], -1);
    $filePath = implode('/',$filePath);
    $redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
    return $redirect;
}

function loginLink() {
    $loginString = redirect() . "/login.php";
    echo '<p>A username must be entered. Click ';
    echo "<a href=$loginString>here</a>";
    echo ' to return to the login screen';
}

function displayContent() {
    $logoutString = redirect() . "/logout.php";
    echo '<p>' . "Hi $_SESSION[username], you have visited this page $_SESSION[visits] times. Click ";
    echo "<a href=$logoutString>here</a> to logout";
    echo '<p><a href="content2.php">Content 2</a><br>';
    $_SESSION['visits']++;
}

if (session_status() == PHP_SESSION_ACTIVE) {
    if (isset($_POST['username'])) {
        //if the POST username is set
        if ($_POST['username'] == '' || is_null(['username'])) {
            //if POST user name is null or empty string show return link
            loginLink();
        } else {
            //otherwise it is not an empty string, set the username
            $_SESSION['username'] = $_POST['username'];
            if(!isset($_SESSION['visits'])){
                //if # of visits doesn't exist initialize it
                $_SESSION['visits'] = 0;
            }
            //increment the visits
            displayContent();
        }
    } elseif (isset($_SESSION['username'])){
        //if the post has not been set, and the session username is set
        displayContent();
    }
}

echo '</body></html>';
?>