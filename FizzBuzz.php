<?php

namespace Deg540\PHPTestingBoilerplate;

class FizzBuzz
{
    function Fizz(int $number1): String
    {
        if($number1%5==0 and $number1%3==0){
            return "FizzBuzz";
        }elseif ($number1%5==0){
            return "Fizz";
        }elseif($number1%3==0){
            return "Buzz";
        }
        return "El numero no es multiplo ni de 3 ni de 5";
    }

}