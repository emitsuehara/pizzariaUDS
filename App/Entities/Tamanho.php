<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tamanho
 * @ORM\Entity
 * @ORM\Table(name="tamanho")
 * @ORM\Entity(repositoryClass="App\Repository\Tamanho") 
 */
class Tamanho {
    
    /**
     * @var integer
     * 
     * @ORM\Column(name="idtamanho")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idtamanho;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="tamanho")
     */
    private $tamanho;
    
    /**
     * @var double
     * 
     * @ORM\Column(name="valor")
     */
    private $valor;
    
    /**
     * @var integer
     * 
     * @ORM\Column(name="tempo")
     */
    private $tempo;

    function getId() {
        return $this->idtamanho;
    }

    function getTamanho() {
        return $this->tamanho;
    }

    function getValor() {
        return $this->valor;
    }

    function getTempo() {
        return $this->tempo;
    }

    function setId($id) {
        $this->idtamanho = $id;
    }

    function setTamanho($tamanho) {
        $this->tamanho = $tamanho;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setTempo($tempo) {
        $this->tempo = $tempo;
    }

}
