<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of Pizza
 *
 * @author Elouise
 */
namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class Pizza extends EntityRepository{
    
    public function getPizza($param) {
        $list =  $this->_em->createNativeQuery('SELECT t.tamanho, t.valor as valortamanho, s.sabor, p.valorfinal, p.tempopreparo, a.adicional, a.valor as valoradicional FROM pizza p 
                                                INNER JOIN tamanho t ON p.idtamanho = t.idtamanho
                                                INNER JOIN sabor s ON p.idsabor = s.idsabor
                                                LEFT JOIN pizza_adicional pa ON p.idpizza = pa.idpizza
                                                LEFT JOIN adicional a ON pa.idadicional = a.idadicional
                                                WHERE p.idpizza  = :idpizza', \App\Helper\ResultingMapping::Mapping(['tamanho', 'valortamanho', 'sabor', 'valorfinal', 'tempopreparo', 'adicional', 'valoradicional']))
                ->setParameter('idpizza', $param)
                ->getArrayResult();
        $out = '';
        $i = 1;
        foreach($list as $element) {
            if ($element['adicional'] != null) {
                $out .= '"adicional'.$i.'": "'. $element['adicional'] . '", "valoradicional'.$i.'": "'. $element['valoradicional'] . '",';
                $i++;   
            } 
        }
        $s = '[{'
                . '"sabor": "'. $list[0]['sabor'] . '",' 
                . '"tamanho": "'. $list[0]['tamanho'] . '",' 
                . '"valortamanho": "'. $list[0]['valortamanho'] . '",' 
                . $out
                . '"valortotal": "'. $list[0]['valorfinal'] . '",' 
                . '"tempopreparo": "'. $list[0]['tempopreparo'] . '"' 
                . '}]'; 
        return $s;
    }
}

