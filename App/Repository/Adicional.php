<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of Adicional
 *
 * @author Elouise
 */
namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class Adicional extends EntityRepository{
    
    public function getAdicional($param = null) {
        $where = $param != null ? 'WHERE idadicional = :idadicional' : '';
        return $this->_em->createNativeQuery("SELECT idadicional, adicional, tempo, valor FROM adicional $where ORDER BY idadicional", 
                \App\Helper\ResultingMapping::Mapping(['idadicional', 'adicional', 'tempo', 'valor']))
                ->setParameter('idadicional', $param)
                ->getArrayResult();
    }
}
