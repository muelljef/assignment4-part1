<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

echo '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>PHP Demo</title>
</head>
<body>Hello</body>';
$list = array('min_multiplicand', 'max_multiplicand', 'min_multiplier', 'max_multiplier');
var_dump($list);
var_dump($_GET);
$test = true;

foreach($list as $key => $value){
    if(!array_key_exists($value, $_GET)){
        echo '<p>' .  $value . ' is not set';
        $test = false;
    }
}

if($test) {

    $tableVals = array();
    foreach($list as $key => $value){
        $tableVals[$value] = (int)$_GET[$value];
    }
    var_dump($tableVals);
    $key = 'min_multiplicand';
    $min_multiplicand = (int)$_GET[$key];
    $key = 'max_multiplicand';
    $max_multiplicand = (int)$_GET[$key];
    $key = 'min_multiplier';
    $min_multiplier = (int)$_GET[$key];
    $key = 'max_multiplier';
    $max_multiplier = (int)$_GET[$key];

    echo '<p><h3>GET Variables</h3>
        <p>
        <table border="1">
        <tr><td>';
    for ($i = $min_multiplier; $i <= $max_multiplier; $i++) {
        echo '<td>' . $i;
    }

    for ($i = $min_multiplicand; $i <= $max_multiplicand; $i++) {
        echo '<tr><td>' . $i;
        for ($j = $min_multiplier; $j <= $max_multiplier; $j++) {
            echo '<td>' . $i * $j;
        }
    }
    echo '</table>';
}
//key values
//min-multiplicand
//max-multiplicand
//min-multiplier
//max-multiplier