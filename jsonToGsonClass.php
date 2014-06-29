<?php
$class_name = 'weitsai_test';
$show_set_function = false;
$show_get_function = true;

$json = '{"from_uid":"adfsdfe3rwersdf343","color":"#000","from_username": "weitsai","message": "android send"}';
$keys = array_keys(json_decode($json, true));

echo "public class $class_name {" . PHP_EOL;

// Declare variables
array_walk($keys, function($val, $key) {
    echo "\tprivate String {$val};\n";
});

// Declare set/get function
// 變數字首大寫
array_walk($keys, function($val, $key) use ($show_set_function, $show_get_function){
    if ($show_set_function) {
        echo "\n\tpublic void set" . capitalize($val) . "(String $val) {\n\t}\n";
    }

    if ($show_get_function) {
        echo "\n\tpublic String get" . capitalize($val) . "() {\n\t\treturn this.{$val};\n\t}\n";
    }
});

echo '}';

function capitalize($string)
{
    return ucfirst(preg_replace_callback(
        '/_([a-z])/',
        function ($m) {
            return strtoupper($m[1]);
        },
        $string
        ));
}
