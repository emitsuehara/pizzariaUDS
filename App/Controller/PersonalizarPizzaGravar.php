<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PersonalizarPizzaGravar
 *
 * @author Elouise
 */

namespace App\Controller;

class PersonalizarPizzaGravar {
    /**
     * @var \Slim\App 
     */
    protected $doctrine;
    
    public function __construct(\Slim\Container $container) {
        $this->doctrine = $container->doctrine;
    }
    
    private function gravar($param) {
        $valor = 0;
        $tempo = 0;
        $pizza = $this->doctrine->find(\App\Entities\Pizza::class, isset($param['idpizza']) ? $param['idpizza'] : filter_input(INPUT_COOKIE, 'idpizza'));
        foreach ($param['adicional'] as $value) {
            $pizzaAdicional = new \App\Entities\PizzaAdicional();
            $adicional = $this->doctrine->find(\App\Entities\Adicional::class, $value);
            $pizzaAdicional->setIdadicional($adicional);
            $pizzaAdicional->setIdpizza($pizza);
            $this->doctrine->persist($pizzaAdicional);
            $valor += $adicional->getValor();
            $tempo += $adicional->getTempo();
        }
        $pizza->setTempopreparo($pizza->getTempopreparo() + $tempo);
        $pizza->setValorfinal($pizza->getValorfinal() + $valor);
        $this->doctrine->persist($pizza);
        $this->doctrine->flush();
    }
    
    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response) {
        try {
            $this->doctrine->beginTransaction();
            $this->gravar($request->getParsedBody());
            $this->doctrine->commit();
        } catch (Exception $ex) {
            $this->doctrine->rollback();
            return $response->withStatus(400);
        }
    }
}
