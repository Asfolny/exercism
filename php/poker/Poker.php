<?php declare(strict_types=1);

class Poker
{
    public array $bestHands = [];
    /** @var Hand[] */
    private array $hands;

    public function __construct(array $hands)
    {
        $this->hands = array_map(fn($hand) => new Hand($hand), $hands);

        $this->rankHands();
    }

    private function rankHands()
    {
        $scores = array_map(fn(Hand $h) => $h->getScore(), $this->hands);

        $bestType = max(array_column($scores, 0));
        foreach ($scores as $i => $score) {
            if ($score[0] !== $bestType) {
                unset($scores[$i]);
            }
        }

        if (count($scores) === 1) {
            reset($scores);
            $this->bestHands[] = $this->hands[key($scores)]->getInput();
            return;
        }

        // more than one hand, work on tie breaking
        $compLength = count(current($scores));
        for ($i = 1; $i < $compLength; $i++) {
            if (count($scores) === 1) {
                break;
            }
            $best = max(array_column($scores, $i));
            foreach ($scores as $key => $score) {
                if ($score[$i] !== $best) {
                    unset($scores[$key]);
                }
            }
        }
        foreach (array_keys($scores) as $i) {
            $this->bestHands[] = $this->hands[$i]->getInput();
        }
    }
}

class Hand
{
    /** @var Card[] */
    private array  $cards;
    private string $input;

    public function __construct(string $input)
    {
        $cards       = explode(',', $input);
        $this->input = $input;

        $this->cards = array_map(static fn($card) => new Card($card), $cards);
        usort($this->cards, static fn(Card $a, Card $b) => $b->getRank() <=> $a->getRank());
    }

    public function getScore(): array
    {
        $ranks = [];
        $suits = [];

        /** @var Card $card */
        foreach ($this->cards as $card) {
            $ranks[] = $card->getRank();
            $suits[] = $card->getSuit();
        }
        $countRanks = array_count_values($ranks);
        $rankFreq   = $countRanks;
        sort($rankFreq);
        $suitFreq = array_count_values($suits);

        $dualSortedCards = [];

        foreach ($countRanks as $num => $rate) {
            $dualSortedCards[] = ['rank' => $num, 'frequency' => $rate];
        }

        //Sort by card rank AND frequency they occur. If three ranks appear 2,2,1 times. The first two will appear first
        //even if they are lower value than the card appearing only once.
        $sortRank      = array_column($dualSortedCards, 'rank');
        $sortFrequency = array_column($dualSortedCards, 'frequency');
        array_multisort($sortFrequency, SORT_DESC, $sortRank, SORT_DESC, $dualSortedCards);

        $cardsByRank = [];
        foreach ($dualSortedCards as $sortedValue) {
            $cardsByRank[] = $sortedValue['rank'];
        }

        if ($this->isArraySame([2, 3, 4, 5, 14], $ranks)) {
            $ranks = [1, 2, 3, 4, 5];
        }

        $isStraight = count(array_unique($ranks)) === 5 && max($ranks) - min($ranks) === 4;
        $isFlush    = max($suitFreq) === 5;

        return match (true) {
            $isFlush && $isStraight => [1000, $ranks[0]],
            $this->isArraySame([4, 1], $rankFreq) => [900, $cardsByRank[0], $cardsByRank[1]],
            $this->isArraySame([3, 2], $rankFreq) => [800, $cardsByRank[0], $cardsByRank[1]],
            $isFlush => [700, ...$ranks],
            $isStraight => [600, max($ranks)],
            $this->isArraySame([3, 1, 1], $rankFreq) => [500, $ranks[0], $ranks[3], $ranks[4]],
            $this->isArraySame(
                [2, 2, 1],
                $rankFreq
            ) => [400, $cardsByRank[0], $cardsByRank[1], $cardsByRank[2]],
            $this->isArraySame([2, 1, 1, 1], $rankFreq) => [300, $ranks[0], $ranks[2], $ranks[3], $ranks[4]],
            default => [100, ...$ranks],
        };
    }

    private function isArraySame(array $a1, array $a2)
    {
        return count($a1) === count($a2) && array_diff($a1, $a2) === array_diff($a2, $a1);
    }

    public function getInput(): string
    {
        return $this->input;
    }
}

class Card
{
    private const RANKS = 'XX23456789TJQKA';
    private const SUITS = 'SDHC';
    private int $rank;
    private int $suit;

    public function __construct(string $value)
    {
        $value      = str_replace('10', 'T', $value);
        $this->rank = strpos(self::RANKS, $value[0]);
        $this->suit = strpos(self::SUITS, $value[1]);
    }

    public function getRank(): int
    {
        return $this->rank;
    }

    public function getSuit(): int
    {
        return $this->suit;
    }
}