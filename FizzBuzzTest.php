<?php


namespace Deg540\PHPTestingBoilerplate\Test;
use Deg540\PHPTestingBoilerplate\FizzBuzz;
use PHPUnit\Framework\TestCase;

final class FizzBuzzTest extends TestCase
{
    /**
     * @test
     */
    public function with5()
    {
        $FizzBuzz = new FizzBuzz();

        $result = $FizzBuzz->Fizz(25);

        $this->assertEquals("Fizz", $result);
    }
    /**
     * @test
     */
    public function with3()
    {
        $FizzBuzz = new FizzBuzz();

        $result = $FizzBuzz->Fizz(9);

        $this->assertEquals("Buzz", $result);
    }
    /**
     * @test
     */
    public function with5and3()
    {
        $FizzBuzz = new FizzBuzz();

        $result = $FizzBuzz->Fizz(15);

        $this->assertEquals("FizzBuzz", $result);
    }
    /**
     * @test
     */
    public function withnone()
    {
        $FizzBuzz = new FizzBuzz();
        $result = $FizzBuzz->Fizz(10);
        $this->assertFalse(False, $result);

    }
}
