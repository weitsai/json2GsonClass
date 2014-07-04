<pre class="java"><code>
<?php
$json = isset($_GET['code_block']) ? $_GET['code_block'] : false;
$class_name = 'weitsai_test';
$show_set_function = true;
$show_get_function = true;

if ($json == false) {
    echo "<h1>Not input json</h1>";
    exit;
}

$keys = array_keys(json_decode($json, true));

echo "public class $class_name {" . PHP_EOL;

$showArray = [];
// Declare variables
array_walk($keys, function($val, $key) {
    global $showArray;
    $showArray[$val] = isset($_GET[$val]) ? $_GET[$val] : false;
    $showArray[$val . '_select'] = isset($_GET['select_' . $val]) ? $_GET['select_' . $val] : false;
    if ($showArray[$val] != false) {
        echo "\tprivate {$showArray[$val . '_select']} {$val};\n";
    }
});
// Declare set/get function
// 變數字首大寫
array_walk($keys, function($val, $key) use ($show_set_function, $show_get_function, $showArray) {
    if ($showArray[$val] == false) {
        return;
    }
    if ($show_set_function) {
        echo "\n\t/**\n\t * @param {$showArray[$val . '_select']}\n\t */";
        echo "\n\tpublic void set" . capitalize($val) . "({$showArray[$val . '_select']} $val) {\n\t}\n";
    }

    if ($show_get_function) {
        echo "\n\t/**\n\t * @return {$showArray[$val . '_select']}\n\t */";
        echo "\n\tpublic {$showArray[$val . '_select']} get" . capitalize($val) . "() {\n\t\treturn this.{$val};\n\t}\n";
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
