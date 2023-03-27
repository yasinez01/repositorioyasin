<?php

namespace Deg540\ohce;
use Deg540\ohce\DateProvider;

class Ohce
{
    public string $name;
    private DateProvider $dataprovider;
    public function __construct(DateProvider $time)
    {
        $this->dataprovider = $time;
    }
    public function echo(string $parametro): string{
        $inicial = explode(" ",$parametro);
        if($inicial[0]=="ohce"){
            $this->name=$inicial[1];
            $horaActual=$this->dataprovider->getTiempo();
            if($horaActual>=12 and $horaActual<20){
                return "¡Buenas tardes ".$this->name."!";
            }elseif ($horaActual>=6 and $horaActual<12){
                return "¡Buenos días ".$this->name."!";
            }
            return "¡Buenas noches ".$this->name."!";
        }
        else if($inicial[0]=="Stop!"){
            return "Adios ".$this->name;
        }
        else if($inicial[0]==strrev($inicial[0])) {
            return $inicial[0]." ¡Bonita palabra!";
        }
        return strrev($inicial[0]);
    }
}