<?php

namespace App;

class RomanNumbers
{
    public const NUMERALS = [
        "M" => 1000,
        "CM" => 900,
        "D" => 500,
        "CD" => 400,
        "C" => 100,
        "XC" => 90,
        "L" => 50,
        "XL" => 40,
        "X" => 10,
        "IX" => 9,
        "V" => 5,
        "IV" => 4,
        "I" => 1,
    ];

    public static function generate(int $int): string
    {
        if ($int <= 0 || $int >= 4000) {
            throw new \InvalidArgumentException('Invalid number');
        }
        $result = "";
        foreach (self::NUMERALS as $numeral => $arabic) {
            for (; $int >= $arabic; $int -= $arabic) {
                $result .= $numeral;
            }
        }
        print_r($result) ;
    }
}