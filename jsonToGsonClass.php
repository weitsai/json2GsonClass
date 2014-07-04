<pre class="java"><code>
<?php
$json = isset($_GET['code_block']) ? $_GET['code_block'] : false;
$class_name = 'weitsai_test';
$show_set_function = false;
$show_get_function = true;

$keys = array_keys(json_decode($json, true));
if ($json == false) {
    echo "<h1>Not input json</h1>";
    exit;
}

echo "public class $class_name {" . PHP_EOL;

// Declare variables
array_walk($keys, function($val, $key) {
    $isShow = isset($_GET[$val]) ? $_GET[$val] : false;
    if ($isShow != false) {
        echo "\tprivate String {$val};\n";
    }
});

// Declare set/get function
// 變數字首大寫
array_walk($keys, function($val, $key) use ($show_set_function, $show_get_function){
    $isShow = isset($_GET[$val]) ? $_GET[$val] : false;
    if ($show_set_function AND $isShow != false) {
        echo "\n\tpublic void set" . capitalize($val) . "(String $val) {\n\t}\n";
    }

    if ($show_get_function AND $isShow != false) {
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
?>
</code></pre>
<link data-turbolinks-track="true" rel="stylesheet" href="http://yandex.st/highlightjs/8.0/styles/tomorrow-night.min.css">
<script src="http://yandex.st/highlightjs/8.0/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
