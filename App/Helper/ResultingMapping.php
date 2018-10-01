<?php

namespace App\Helper;

class ResultingMapping {

    public static function Mapping($array) {
        $rsm = new \Doctrine\ORM\Query\ResultSetMapping();
        array_map(function($x) use ($rsm) {
            $rsm->addScalarResult($x, $x);
        }, $array);
        return $rsm;
    }

}
