<?php

//http://php.net/manual/en/ref.filter.php
//http://php.net/filter.filters

$filter_rules = [
    'name' => FILTER_SANITIZE_STRING,
    'email' => FILTER_VALIDATE_EMAIL,
    'ip' => FILTER_VALIDATE_IP,
    'website' => FILTER_VALIDATE_URL,
];

$validation = [
    'name'=>[
        'is_null'=>'name is empty',
        'is_false'=>'name is wrong value',
    ],
    'email'=>[
        'is_null'=>'email is empty',
        'is_false'=>'email is wrong value',
    ],
    'ip'=>[
        'is_null'=>'ip is empty',
        'is_false'=>'ip is wrong value',
    ],
    'website'=>[
        'is_null'=>'website is empty',
        'is_false'=>'website is wrong value',
    ],
];

/** MOTOR OU CORE DA APLICAÇÃO */

$data = filter_input_array(INPUT_POST, $filter_rules);

foreach ($data as $field=>$value) {
    if (empty($validation[$field])) {
        continue;
    }

    if ($value === null or $value == '') {
       echo $validation[$field]['is_null'];
    } elseif ($value === false) {
       echo $validation[$field]['is_false'];
    }

    echo '<br>';
}

echo '<br>';

var_dump($data);

echo '<a href="index.html">voltar</a>';
