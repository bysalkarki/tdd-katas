<?php

use App\Player;
use App\TennisMatch;
use PHPUnit\Framework\TestCase;

class TennisMatchTest extends TestCase
{
    /**
     * @return void
     * @test
     * @dataProvider scores
     */
    function it_calculates_the_score($playerOnePoint, $playerTwoPoint, $score): void
    {
        $match = new TennisMatch($joe = new Player('Joe'), $jane = new Player('Jane'));
        for ($i = 0; $i < $playerOnePoint; $i++) {
            $match->pointTo($joe);
        }
        for ($i = 0; $i < $playerTwoPoint; $i++) {
            $match->pointTo($jane);
        }
        $this->assertEquals($score, $match->score());
    }

    public static function scores(): array
    {
        return [
            [0, 0, 'love-love'],
            [1, 0, 'fifteen-love'],
            [2, 0, 'thirty-love'],
            [2, 2, 'thirty-thirty'],
            [3, 0, 'forty-love'],
            [4, 0, 'Winner: Joe'],
            [0, 4, 'Winner: Jane'],
            [3, 3, 'Duece'],
            [4, 4, 'Duece'],
            [5, 5, 'Duece'],
            [6, 6, 'Duece'],
            [4, 3, 'Advantage: Joe'],
            [5, 4, 'Advantage: Joe'],
            [3, 4, 'Advantage: Jane'],
            [4, 5, 'Advantage: Jane'],
        ];
    }
}