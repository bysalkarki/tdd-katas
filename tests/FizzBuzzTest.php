<?php

use App\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    /**
     * @return void
     * @test
     */
    public function it_prints_fizz_for_multiples_of_three()
    {
        foreach ([3, 6, 9, 12] as $num) {
            $this->assertEquals('fizz', FizzBuzz::convert($num));
        }
    }

    /**
     * @return void
     * @test
     */
    public function it_prints_buzz_for_multiples_of_three()
    {
        foreach ([5, 10, 20, 25] as $num) {
            $this->assertEquals('buzz', FizzBuzz::convert($num));
        }
    }

    /**
     * @return void
     * @test
     */
    public function it_prints_fizzbuzz_for_multiples_of_three_and_five()
    {
        foreach ([15, 30, 45, 60, 75] as $num) {
            $this->assertEquals('fizzbuzz', FizzBuzz::convert($num));
        }
    }

}