<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * PizzaAdicional
 * @ORM\Entity
 * @ORM\Table(name="pizza_adicional")
 */
class PizzaAdicional {
    
    /**
     * @var integer
     * 
     * @ORM\Column(name="idpizzaadicional")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idpizzaadicional;
    
    /**
     * @var \App\Entities\Pizza
     *
     * @ORM\ManyToOne(targetEntity="\App\Entities\Pizza")
     * @ORM\JoinColumn(name="idpizza", referencedColumnName="idpizza")
     */
    private $idpizza;
    
    /**
     * @var \App\Entities\Adicional
     *
     * @ORM\ManyToOne(targetEntity="\App\Entities\Adicional")
     * @ORM\JoinColumn(name="idadicional", referencedColumnName="idadicional")
     */
    private $idadicional;
    
    function getIdpizzaadicional() {
        return $this->idpizzaadicional;
    }

    function getIdpizza(): \App\Entities\Pizza {
        return $this->idpizza;
    }

    function getIdadicional(): \App\Entities\Adicional {
        return $this->idadicional;
    }

    function setIdpizzaadicional($idpizzaadicional) {
        $this->idpizzaadicional = $idpizzaadicional;
    }

    function setIdpizza(\App\Entities\Pizza $idpizza) {
        $this->idpizza = $idpizza;
    }

    function setIdadicional(\App\Entities\Adicional $idadicional) {
        $this->idadicional = $idadicional;
    }

}
