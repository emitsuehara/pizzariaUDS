<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MontarPizzaGravar
 *
 * @author Elouise
 */

namespace App\Controller;

class MontarPizzaGravar {
    
    /**
     * @var \Slim\App 
     */
    protected $doctrine;
    
    public function __construct(\Slim\Container $container) {
        $this->doctrine = $container->doctrine;
    }
    
    private function gravar($param) {
        $pizza = new \App\Entities\Pizza();
        $sabor = $this->doctrine->find(\App\Entities\Sabor::class, $param['idsabor']);
        $tamanho = $this->doctrine->find(\App\Entities\Tamanho::class, $param['idtamanho']);
        $pizza->setIdsabor($sabor);
        $pizza->setIdtamanho($tamanho);
        $pizza->setTempopreparo(($tamanho->getTempo() + ($sabor->getTempo() || 0)));
        $pizza->setValorfinal($tamanho->getValor());
        $this->doctrine->persist($pizza);
        $this->doctrine->flush();
        setcookie("idpizza",$pizza->getIdpizza(),time()+5);
        return '{"idpizza": "'.$pizza->getIdpizza().'"}';
    }
    
    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response) {
        try {
            $this->doctrine->beginTransaction();
            $_dados = $this->gravar($request->getParsedBody());
            $this->doctrine->commit();
            return $response->withJson(json_decode($_dados, true));
        } catch (Exception $ex) {
            $this->doctrine->rollback();
            return $response->withStatus(400);
        }
    }
}
