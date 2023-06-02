<?php

namespace App;

use Exception;

/**
 *
 */
class StringCalculator
{

    /**
     * @var string
     */
    private string $delimiter = ",|\n";

    /**
     * @var string
     */
    private string $customDelimiter = "\/\/(.)\n";

    /**
     *
     */
    public const  MAX_NUM_ALLOWED = 1000;

    /**
     * @param string $num
     * @return float|int
     * @throws Exception
     */
    public function add(string $num): float|int
    {
        if(empty($num)){
            return 0;
        }
        $this->disallowNegatives($numbers = $this->parseString($num));
        return array_sum($this->ignoreGreaterThanThousand($numbers));
    }

    /**
     * Do not allow any negative numbers.
     *
     * @param  array  $numbers
     * @throws Exception
     */
    protected function disallowNegatives(array $numbers): void
    {
        foreach ($numbers as $number) {
            if ($number < 0) {
                throw new Exception('Negative numbers are disallowed.');
            }
        }
    }


    /**
     * @param string $num
     * @param $matches
     * @return array
     */
    public function parseString(string $num): array
    {
        if (preg_match("/{$this->customDelimiter}/", $num, $matches)) {
            $this->delimiter = $matches[1];
            $num = str_replace($matches[0], '', $num);
        }

        return preg_split("/{$this->delimiter}/", $num);
    }

    /**
     * @param array $numbers
     * @return array
     */
    public function ignoreGreaterThanThousand(array $numbers): array
    {
        return array_filter($numbers, static fn($num): bool => $num < self::MAX_NUM_ALLOWED);
    }
}