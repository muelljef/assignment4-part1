<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
echo '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>PHP loopback</title>
</head>
<body>';

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
    $getJSON = new jsonObj('GET');
    $getJSON->fillParams();
    $jsonString = json_encode($getJSON);
    echo $jsonString;
} else if (count($_POST) > 0) {
    $postJSON = new jsonObj('POST');
    $postJSON->fillParams();
    $jsonString = json_encode($postJSON);
    echo $jsonString;
} else {
    echo '<p>' . 'GET and POST have no variables';
}

echo '</body></html>';
