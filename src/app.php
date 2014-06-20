<?php

use Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\SerializerServiceProvider;

require __DIR__ . '/../app/config/config.php';

$app->register(new DoctrineServiceProvider, array(
    "db.options" => $config['db'],
));

$app->register(new DoctrineOrmServiceProvider, array(
    "orm.proxies_dir" => __DIR__ . "/app/proxies",
    "orm.em.options" => array(
        "mappings" => array(
            array(
                "type" => "annotation",
                "namespace" => "Kotoblog\Entity",
                "path" => __DIR__."/Kotoblog/Entity",
            ),
        ),
    ),
));

$app->register(new SerializerServiceProvider());
