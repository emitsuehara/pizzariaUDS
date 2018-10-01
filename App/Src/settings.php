<?php

return [
    'settings' => [
        'displayErrorDetails' => true, 
        'addContentLengthHeader' => false, 
        'doctrine' => [
            'isdevmode' => true,
            'paths' => ['/App/Entities'],
            'params' => [
                'driver' => 'pdo_mysql',
                'host' => 'localhost',
                'user' => 'root',
                'password' => '',
                'dbname' => 'pizzariauds',
                'charset'  => 'utf8',
                'driverOptions' => array(
                    1002 => 'SET NAMES utf8'
                )
            ]
        ]
    ]
];


