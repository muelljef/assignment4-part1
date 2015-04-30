<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
echo '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>PHP loopback</title>
</head>
<body>Hello';

class jsonObj {
    function __construct($type){
        $this->type = $type;
    }
    public $type;
    public $parameters = array();
    function fillParams(){
        if ($this->type == 'GET'){
            foreach($_GET as $key => $value){
                if ($value == ''){
                    $this->parameters[$key] = null;
                } else {
                    $this->parameters[$key] = $value;
                }
            }
        } elseif ($this->type == 'POST') {
            foreach($_POST as $key => $value){
                if ($value == ''){
                    $this->parameters[$key] = null;
                } else {
                    $this->parameters[$key] = $value;
                }
            }
        } else {
            echo '<p>' . 'The object was not created as POST or GET';
        }
    }
}

if(count($_GET) > 0){
    echo '<p>' . 'GET has variables';
    $getJSON = new jsonObj('GET');
    $getJSON->fillParams();
} else if (count($_POST) > 0) {
    echo '<p>' . 'POST has variables';
    $postJSON = new jsonObj('POST');
} else {
    echo '<p>' . 'GET and POST have no variables';
}

$jsonString = json_encode($getJSON);
echo $jsonString;

echo '</body>
</html>';
?>