<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of Tamanho
 *
 * @author Elouise
 */
namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class Tamanho extends EntityRepository{
    
    public function getTamanho($param = null) {
        $where = $param != null ? 'WHERE idtamanho = :idtamanho' : '';
        return $this->_em->createNativeQuery("SELECT idtamanho, tamanho, tempo, valor FROM tamanho $where ORDER BY idtamanho", 
                \App\Helper\ResultingMapping::Mapping(['idtamanho', 'tamanho', 'tempo', 'valor']))
                ->setParameter('idtamanho', $param)
                ->getArrayResult();
    }
}
