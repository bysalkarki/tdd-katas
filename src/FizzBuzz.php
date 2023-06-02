<?php

namespace App;

class FizzBuzz
{

    /**
     * @param int $int
     * @return int|string
     */
    public static function convert(int $int): int|string
    {
        $string = null;

        if ($int % 3 === 0) {
            $string .= 'fizz';
        }

        if ($int % 5 === 0) {
            $string .= 'buzz';
        }

        return $string ?? $int;
    }


}