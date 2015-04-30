<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Content 1</title>
    </head>
<body>

<?php
session_start();
//session related variable and function calls
//reference from OSU's lectures and lecture code
function redirect(){
    session_destroy();
    $filePath = explode('/', $_SERVER['PHP_SELF'], -1);
    $filePath = implode('/',$filePath);
    $redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath . "/login.php";
    //header("Location: {$redirect}/login.php", true);
    return $redirect;
}

function loginLink() {
    echo '<a href=' . redirect() . '>Here</a>';
}

if (session_status() == PHP_SESSION_ACTIVE) {
    if (isset($_POST['username'])) {
        if ($_POST['username'] == '' || is_null(['username'])){
            //add redirect function call here
            echo "you have not set the username";
            loginLink();
        } else {
            $_SESSION['username'] = $_POST['username'];
            if(!isset($_SESSION['visits'])){
                $_SESSION['visits'] = 0;
            }

            $_SESSION['visits']++;
            echo "Hi $_SESSION[username], you have visited this page $_SESSION[visits] times. \n";
        }
    }
}
?>

</body></html>
