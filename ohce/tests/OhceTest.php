<?php

declare(strict_types=1);

namespace Deg540\ohce\Test;
use Deg540\ohce\Ohce;
use Deg540\ohce\DateProvider;
use PHPUnit\Framework\TestCase;
final class OhceTest extends TestCase
{

    /**
     * @test
     */
    public function likesWordIfPalindrome()
    {
        $time = new DateProvider();
        $ohce = new Ohce($time);
        $respuesta = $ohce->echo("ojo");
        $this->assertEquals($respuesta,"ojo ¡Bonita palabra!");
    }
    /**
     * @test
     */
    public function echoesReversedWordIfNotPalindrome()
    {
        $time = new DateProvider();
        $ohce = new Ohce($time);
        $respuesta = $ohce->echo("manzana");
        $this->assertEquals($respuesta,"anaznam");
    }
    /**
     * @test
     */
    public function greetsIntheMorning(){
        $time = \Mockery::mock(DateProvider::class);
        $Ohce = new Ohce($time);


        $time
            ->expects('getTiempo')
            ->andReturn(7);

        $sucess = $Ohce->echo("ohce Yasin");

        $this->assertEquals("¡Buenos días Yasin!",$sucess);
    }
    /**
     * @test
     */
    public function greetsIntheAfternoon(){
        $time = \Mockery::mock(DateProvider::class);
        $Ohce = new Ohce($time);


        $time
            ->expects('getTiempo')
            ->andReturn(16);

        $sucess = $Ohce->echo("ohce Antonio");

        $this->assertEquals("¡Buenas tardes Antonio!",$sucess);
    }
    /**
     * @test
     */
    public function greetsAtNight(){
        $time = \Mockery::mock(DateProvider::class);
        $Ohce = new Ohce($time);


        $time
            ->expects('getTiempo')
            ->andReturn(21);

        $sucess = $Ohce->echo("ohce Maria");

        $this->assertEquals("¡Buenas noches Maria!",$sucess);
    }
    /**
     * @test
     */
    public function adios()
    {
        $time = new DateProvider();
        $ohce = new Ohce($time);

        $inicio = $ohce->echo("ohce Juan");
        $StopMessage = $ohce->echo("Stop!");
        $this->assertEquals($StopMessage,"Adios Juan");
    }
}
