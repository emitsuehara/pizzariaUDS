<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pizza
 * @ORM\Table(name="pizza")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\Pizza") 
 */
class Pizza {
    
    /**
     * @var integer
     * 
     * @ORM\Column(name="idpizza")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idpizza;
    
    /**
     * @var \App\Entities\Tamanho
     *
     * @ORM\ManyToOne(targetEntity="\App\Entities\Tamanho")
     * @ORM\JoinColumn(name="idtamanho", referencedColumnName="idtamanho")
     */
    private $idtamanho;
    
    /**
     * @var \App\Entities\Sabor
     *
     * @ORM\ManyToOne(targetEntity="\App\Entities\Sabor")
     * @ORM\JoinColumn(name="idsabor", referencedColumnName="idsabor")
     */
    private $idsabor;
    
    /**
     * @var integer
     * 
     * @ORM\Column(name="tempopreparo")
     */
    private $tempopreparo;
    
    /**
     * @var double
     * 
     * @ORM\Column(name="valorfinal")
     */
    private $valorfinal;

    function getIdpizza() {
        return $this->idpizza;
    }

    function getIdtamanho() {
        return $this->idtamanho;
    }

    function getIdsabor() {
        return $this->idsabor;
    }

    function getTempopreparo() {
        return $this->tempopreparo;
    }

    function setIdpizza($idpizza) {
        $this->idpizza = $idpizza;
    }

    function setIdtamanho($idtamanho) {
        $this->idtamanho = $idtamanho;
    }

    function setIdsabor($idsabor) {
        $this->idsabor = $idsabor;
    }

    function setTempopreparo($tempopreparo) {
        $this->tempopreparo = $tempopreparo;
    }
    function getValorfinal() {
        return $this->valorfinal;
    }

    function setValorfinal($valorfinal) {
        $this->valorfinal = $valorfinal;
    } 
}
