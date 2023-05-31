<?php


use App\RomanNumbers;
use PHPUnit\Framework\TestCase;

class RomanNumbersTest extends TestCase
{
    public static function RomanNumbers()
    {
        return [
            [1, 'I'],
            [2, 'II'],
            [3, 'III'],
            [4, 'IV'],
            [5, 'V'],
            [6, 'VI'],
            [7, 'VII'],
            [8, 'VIII'],
            [9, 'IX'],
            [10, 'X'],
            [10, 'X'],
            [39, 'XXXIX'],
            [40, 'XL'],
            [50, 'L'],
        ];
    }

    /**
     * @test
     *
     * @dataProvider RomanNumbers
     * @return void
     */
    public function it_generates_the_roman_number(int $number, string $expected): void
    {
        $this->assertEquals($expected, RomanNumbers::generate($number));
    }

    /**
     * @test
     */
    function it_cannot_generate_roman_numbers_for_less_than_one()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid number");
        RomanNumbers::generate(0);
    }

    /**
     * @test
     */
    function it_cannot_generate_roman_numbers_for_more_than_3999()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid number");
        RomanNumbers::generate(0);
    }
}
