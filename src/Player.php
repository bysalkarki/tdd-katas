<?php

namespace App;
class Player
{
    public int $point = 0;

    /**
     * @param string $name
     */
    public function __construct(public string $name)
    {

    }

    public function score(): void
    {
        $this->point++;
    }

    public function pointsToTerm(): string
    {
        return match ($this->point) {
            0 => 'love',
            1 => 'fifteen',
            2 => 'thirty',
            3 => 'forty',
        };
    }
}