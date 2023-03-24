<?php

namespace Deg540\ohce;

class Time
{
    public function getTiempo(string $nombre){
        date_default_timezone_set("Europe/Madrid");
        $horaActual = date("H:i:s");
        if($horaActual>"20:00:00" and $horaActual<"06:00:00"){
            return "¡Buenas noches ".$nombre."!";
        }elseif ($horaActual>"6:00:00" and $horaActual<"12:00:00"){
            return "¡Buenos días ".$nombre."!";
        }else{
            return "¡Buenas tardes ".$nombre."!";
        }
    }

}