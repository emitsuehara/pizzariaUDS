<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sabor
 * @ORM\Entity
 * @ORM\Table(name="adicional") 
 * @ORM\Entity(repositoryClass="App\Repository\Adicional") 
 */
class Adicional {
    
    /**
     * @var integer
     * 
     * @ORM\Column(name="idadicional")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idadicional;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="adicional")
     */
    private $adicional;
    
    /**
     * @var integer
     * 
     * @ORM\Column(name="tempo")
     */
    private $tempo;
    
    /**
     * @var double
     * 
     * @ORM\Column(name="valor")
     */
    private $valor;

    function getIdadicional() {
        return $this->idadicional;
    }

    function getAdicional() {
        return $this->adicional;
    }

    function getTempo() {
        return $this->tempo;
    }

    function getValor() {
        return $this->valor;
    }

    function setIdadicional($idadicional) {
        $this->idadicional = $idadicional;
    }

    function setAdicional($adicional) {
        $this->adicional = $adicional;
    }

    function setTempo($tempo) {
        $this->tempo = $tempo;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

}
