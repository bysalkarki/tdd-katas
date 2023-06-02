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

    /**
     * @return void
     * @test
     */
    public function it_prints_original_for_not_multiples_of_three_or_five()
    {
        foreach ([2, 4, 97, 113, 17] as $num) {
            $this->assertEquals($num, FizzBuzz::convert($num));
        }
    }

}