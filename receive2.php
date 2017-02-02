<?php

//http://php.net/manual/en/ref.filter.php
//http://php.net/filter.filters

$data['name'] = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);
$data['email'] = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);
$data['ip'] = filter_input(INPUT_GET, 'ip', FILTER_SANITIZE_STRING);
$data['website'] = filter_input(INPUT_GET, 'website', FILTER_SANITIZE_URL);

if ($data['name'] == null) {
    throw new Exception("name is empty");
}

if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    throw new Exception("email not valid");
}

if (!filter_var($data['ip'], FILTER_VALIDATE_IP)) {
    throw new Exception("ip not valid");
}

if ($data['website'] === null or $data['website'] === '') {
    throw new Exception("website is empty");
}

if (!filter_var($data['website'], FILTER_VALIDATE_URL)) {
    throw new Exception("website not valid");
}

var_dump($data);

echo '<a href="index.html">voltar</a>';
