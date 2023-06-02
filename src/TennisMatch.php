<?php

namespace App;

class TennisMatch
{
    public function __construct(public Player $playerOne,
                                public Player $playerTwo)
    {
    }

    public function score(): string
    {
        if ($this->hasWinner()) {
            return "Winner: " . $this->leader()->name;
        }

        if ($this->isDuece()) {
            return 'Duece';
        }

        if ($this->hasAdvantage()) {
            return 'Advantage: ' . $this->leader()->name;
        }

        return $this->playerOne->pointsToTerm() . "-" . $this->playerTwo->pointsToTerm();
    }


    public function pointTo(Player $player): void
    {
        $player->score();
    }


    /**
     * @return bool
     */
    public function hasWinner(): bool
    {
        if (max([$this->playerOne->point, $this->playerTwo->point]) < 4) {
            return false;
        }

        return abs($this->playerOne->point - $this->playerTwo->point) >= 2;
    }

    /**
     * @return Player
     */
    public function leader(): Player
    {
        return $this->playerOne->point > $this->playerTwo->point ? $this->playerOne : $this->playerTwo;
    }

    /**
     * @return bool
     */
    public function isDuece(): bool
    {

        return $this->isCanBeWon() && $this->playerOne->point === $this->playerTwo->point;
    }

    /**
     * @return bool
     */
    private function hasAdvantage(): bool
    {
        if ($this->isCanBeWon()) {
            return !$this->isDuece();
        }
        return false;
    }

    /**
     * @return bool
     */
    public function isCanBeWon(): bool
    {
        return $this->playerTwo->point >= 3 && $this->playerOne->point >= 3;
    }
}