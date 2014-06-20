<?php

$headers = apache_request_headers();

if(!array_key_exists('Content-Type', $headers) || false === strpos($headers['Content-Type'], 'json')) {
    http_response_code(200);
    header('Content-Type: text/html');
    echo file_get_contents('index.html');
    exit;
}


define('REST_PUBLIC_ROOT', __DIR__);

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();

require __DIR__ . '/../app/config/dev.php';
require __DIR__ . '/../src/app.php';
require __DIR__ . '/../src/controllers.php';

$app->run();
