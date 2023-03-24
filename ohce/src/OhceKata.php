<?php

namespace Deg540\ohce;
use Deg540\ohce\Time;

class OhceKata
{
    public string $name;
    private Time $tiempo;
    public function __construct(Time $time)
    {
        $this->tiempo = $time;
    }
    public function ohce(string $inicio){
        $array = explode(" ",$inicio);
        if($array[0]=="ohce"){
            $this->name=$array[1];
            return $this->tiempo->getTiempo($array[1]);
        }
    }

    public function esPalindroma(string $palabra): string{
        if($palabra=="Stop!"){
            return "Adios ".$this->name;
        }
        if($palabra==strrev($palabra)) {
            return $palabra."¡Bonita palabra!";
        }
        return strrev($palabra);
    }
}