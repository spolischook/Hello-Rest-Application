<?php

define('REST_PUBLIC_ROOT', __DIR__);

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();

require __DIR__ . '/../app/config/prod.php';
require __DIR__ . '/../src/app.php';
require __DIR__ . '/../src/controllers.php';

\Symfony\Component\HttpFoundation\Request::setTrustedProxies(array('127.0.0.1', '::1'));
$app['http_cache']->run();
