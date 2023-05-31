<?php

use App\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{

    /** @test */
    function it_evaluates_an_empty_string_as_0()
    {
        $calculator = new StringCalculator();

        $this->assertSame(0, $calculator->add(''));
    }

    /** @test * */
    function it_finds_the_sum_of_single_number()
    {
        $calculator = new StringCalculator();

        $this->assertSame(5, $calculator->add('5'));
    }

    /** @test * */
    function it_finds_the_sum_of_two_numbers()
    {
        $calculator = new StringCalculator();

        $this->assertSame(10, $calculator->add('5,5'));
    }

    /** @test * */
    function it_finds_the_sum_of_any_numbers()
    {
        $calculator = new StringCalculator();

        $this->assertSame(29, $calculator->add('5,5,9,10'));
    }

    /** @test * */
    function it_accepts_newline_as_dilimitor()
    {
        $calculator = new StringCalculator();

        $this->assertSame(20, $calculator->add("5\n5\n10"));
    }

    /** @test * */
    function negative_number_not_allowed()
    {
        $calculator = new StringCalculator();

        $this->expectException(\Exception::class);
        $calculator->add('5,-4');
    }



    /** @test */
    function it_suepports_custom_delimiters()
    {
        $calculator = new StringCalculator();

        $this->assertSame(15, $calculator->add("//:\n5:10"));
    }
}