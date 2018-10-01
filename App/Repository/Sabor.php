<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of Sabor
 *
 * @author Elouise
 */
namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class Sabor extends EntityRepository{
    
    public function getSabor($param = null) {
        $where = $param != null ? 'WHERE idsabor = :idsabor' : '';
        return $this->_em->createNativeQuery("SELECT idsabor, sabor, tempo FROM sabor $where ORDER BY idsabor", 
                \App\Helper\ResultingMapping::Mapping(['idsabor', 'sabor', 'tempo']))
                ->setParameter('idsabor', $param)
                ->getArrayResult();
    }
}
