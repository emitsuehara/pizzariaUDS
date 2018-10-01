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
 * @ORM\Table(name="sabor")
 * @ORM\Entity(repositoryClass="App\Repository\Sabor") 
 */
class Sabor {
    
    /**
     * @var integer
     * 
     * @ORM\Column(name="idsabor")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idsabor;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="sabor")
     */
    private $sabor;
    
    /**
     * @var integer
     * 
     * @ORM\Column(name="tempo")
     */
    private $tempo;

    function getIdsabor() {
        return $this->idsabor;
    }

    function getSabor() {
        return $this->sabor;
    }

    function getTempo() {
        return $this->tempo;
    }

    function setIdsabor($idsabor) {
        $this->idsabor = $idsabor;
    }

    function setSabor($sabor) {
        $this->sabor = $sabor;
    }

    function setTempo($tempo) {
        $this->tempo = $tempo;
    }

}
