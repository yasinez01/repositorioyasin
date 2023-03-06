<?php

declare(strict_types=1);

namespace Deg540\PHPTestingBoilerplate\Test;
use Deg540\PHPTestingBoilerplate\StringCalculator;
use PHPUnit\Framework\TestCase;
use function Sodium\add;

final class StringCalculatorTest extends TestCase
{
    // TODO: String Calculator Kata Tests
    /**
     * @test
     */
    public function shouldAddceroArguments()
    {
        $string_calculator = new StringCalculator();
        $result = $string_calculator->add("");
        $this->assertEquals(0, $result);
    }
    /**
     * @test
     */
    public function shouldAddoneArgument()
    {
        $string_calculator = new StringCalculator();
        $result = $string_calculator->add("1");
        $this->assertEquals(1, $result);
    }
    /**
     * @test
     */
    public function shouldAddtwoArguments()
    {
        $string_calculator = new StringCalculator();
        $result = $string_calculator->add("1,5");
        $this->assertEquals(6, $result);
    }
    /**
     * @test
     */
    public function shouldAddthreeArguments()
    {
        $string_calculator = new StringCalculator();
        $result = $string_calculator->add("2\n5,10");
        $this->assertEquals(17, $result);
    }
    /**
     * @test
     */
    public function shouldAddfourArguments()
    {
        $string_calculator = new StringCalculator();
        $result = $string_calculator->add("//;\n1;2");
        $this->assertEquals(3, $result);
    }
    /**
     * @test
     */
    public function shouldAddfiveArguments()
    {
        $string_calculator = new StringCalculator();
        $result = $string_calculator->add("//;\n1;2,1001");
        $this->assertEquals(3, $result);
    }
}
