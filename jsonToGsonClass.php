<?php
$json = '{"from_uid":"adfsdfe3rwersdf343","color":"#000","from_username": "weitsai","message": "android send"}';
$keys = array_keys(json_decode($json, true));

echo 'public class test {' . PHP_EOL;

// Declare variables
array_walk($keys, function($val, $key) {
   echo "\tprivate String {$val};\n";
});

// Declare set/get function
// 變數字首大寫
array_walk($keys, function($val, $key) {
   echo "\n\tpublic void set" . ucfirst($val) . "{\n\t}\n";
});

echo '}';

