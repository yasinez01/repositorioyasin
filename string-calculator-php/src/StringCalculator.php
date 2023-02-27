<?php

namespace Deg540\PHPTestingBoilerplate;

use Exception;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use function PHPUnit\Framework\equalTo;

class StringCalculator
{
    function add(String $string):int|null{
        $delimiters = [';',"\n",'//',',','*','[',']'];
        $newStr = str_replace($delimiters, $delimiters[0], $string);
        $lista=explode($delimiters[0],$newStr);
        $suma=0;
        for($i=0;$i<sizeof($lista);$i++){
            if((int)($lista[$i])<0){
                throw new Exception("negativos no soportados");
                return null;
            }elseif((int)($lista[$i])>1000){
                $suma=$suma-(int)($lista[$i]);
            }
            $suma=$suma+(int)($lista[$i]);
        }
        return $suma;
    }
}