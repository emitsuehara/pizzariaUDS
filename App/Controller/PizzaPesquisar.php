<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PizzaPesquisar
 *
 * @author Elouise
 */

namespace App\Controller;

class PizzaPesquisar {
    /**
     * @var \Slim\App 
     */
    protected $doctrine;
    
    public function __construct(\Slim\Container $container) {
        $this->doctrine = $container->doctrine;
    }
    
    private function pesquisar($param = null) {
        return $this->doctrine->getRepository(\App\Entities\Pizza::class)->getPizza($param != null ? $param : filter_input(INPUT_COOKIE, 'idpizza'));   
    }
    
    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response) {
        try {
            $_dados = $this->pesquisar($request->getAttribute('params'));
            return $response->withJson(json_decode($_dados, true));
        } catch (Exception $ex) {
            return $response->withStatus(400);
        }
    }
}
