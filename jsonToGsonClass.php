<?php
$json = '{"from_uid":"adfsdfe3rwersdf343","color":"#000","from_username": "weitsai","message": "android send"}';
$keys = array_keys(json_decode($json, true));

echo 'public class test {' . PHP_EOL;

// Declare variables
array_walk($keys, function($val, $key) {
   echo "\t private String {$val};\n";
});

echo '}';

