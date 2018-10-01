<?php

$container = $app->getContainer();

$container['doctrine'] = function($c) {
    $settings = $c->get('settings')['doctrine'];
    $config = \Doctrine\ORM\Tools\Setup::createConfiguration($settings['isdevmode']);
    $driver = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver(new \Doctrine\Common\Annotations\AnnotationReader(), $settings['paths']);
    $config->setMetadataDriverImpl($driver);
    if (!$settings['isdevmode']) {
        $config->setQueryCacheImpl(new \Doctrine\Common\Cache\ApcCache());
        $config->setResultCacheImpl(new \Doctrine\Common\Cache\ApcCache());
    }
    \Doctrine\Common\Annotations\AnnotationRegistry::registerFile(ROOT_PATH . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php');
    return \Doctrine\ORM\EntityManager::create($settings['params'], $config);
};
