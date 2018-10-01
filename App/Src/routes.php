<?php

$app->post('/montar', App\Controller\MontarPizzaGravar::class);
$app->post('/personalizar', App\Controller\PersonalizarPizzaGravar::class);
$app->get('/pizza[/{params:.*}]', App\Controller\PizzaPesquisar::class);
$app->get('/adicional[/{params:.*}]', App\Controller\AdicionalPesquisar::class);
$app->get('/tamanho[/{params:.*}]', App\Controller\TamanhoPesquisar::class);
$app->get('/sabor[/{params:.*}]', App\Controller\SaborPesquisar::class);
