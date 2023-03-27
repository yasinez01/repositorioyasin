<?php

namespace Deg540\ohce;

class DateProvider
{
    public function getTiempo():int{
        date_default_timezone_set("Europe/Madrid");
        return date("H");
    }

}