<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SaborPesquisar
 *
 * @author Elouise
 */

namespace App\Controller;

class SaborPesquisar {
    /**
     * @var \Slim\App 
     */
    protected $doctrine;
    
    public function __construct(\Slim\Container $container) {
        $this->doctrine = $container->doctrine;
    }
    
    private function pesquisar($param) {
        return $this->doctrine->getRepository(\App\Entities\Sabor::class)->getSabor($param);   
    }
    
    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response) {
        try {
            $_dados = $this->pesquisar($request->getAttribute('params'));
            return $response->withJson($_dados);
        } catch (Exception $ex) {
            return $response->withStatus(400);
        }
    }
    
    
}
