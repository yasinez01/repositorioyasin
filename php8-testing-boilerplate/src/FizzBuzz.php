<?php

namespace Deg540\PHPTestingBoilerplate;

class FizzBuzz
{
    function Fizz(int $number): String
    {
        if($number%15==0){
            return "FizzBuzz";
        }elseif ($number%5==0){
            return "Fizz";
        }elseif($number%3==0){
            return "Buzz";
        }
        return "El numero no es multiplo ni de 3 ni de 5";
    }

}