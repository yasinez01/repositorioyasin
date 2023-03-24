<?php

declare(strict_types=1);

namespace Deg540\ohce\Test;
use Deg540\ohce\OhceKata;
use Deg540\ohce\Time;
use PHPUnit\Framework\TestCase;
final class CalculatorTest extends TestCase
{
    /**
     * @test
     */
    public function errorcheckingtimeatstart(){
        $time = \Mockery::mock(Time::class);
        $Ohce = new OhceKata($time);
        $time
            ->allows()
            ->getTiempo("Yasin")
            ->andReturns("¡Buenas noches Yasin!");
        $sucess = $Ohce->ohce("ohce Yasin");
        $this->assertEquals("¡Buenas noches Yasin!",$sucess);
    }
    /**
     * @test
     */
    public function errorcheckingpalidromaequals()
    {
        $time = new Time();
        $ohce = new OhceKata($time);
        $respuesta = $ohce->esPalindroma("ojo");
        $this->assertEquals($respuesta,"ojo"."¡Bonita palabra!");
    }
    /**
     * @test
     */
    public function errorcheckingpalidromanotequals()
    {
        $time = new Time();
        $ohce = new OhceKata($time);
        $respuesta = $ohce->esPalindroma("manzana");
        $this->assertEquals($respuesta,"anaznam");
    }
    /**
     * @test
     */
    public function adios()
    {
        $time = new Time();
        $ohce = new OhceKata($time);
        $respuesta = $ohce->ohce("ohce Juan");
        $respuesta = $ohce->esPalindroma("Stop!");
        $this->assertEquals($respuesta,"Adios Juan");
    }
}
