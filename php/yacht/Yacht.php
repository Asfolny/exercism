<?php declare(strict_types=1);

class Yacht
{
    public const ONES = 'ones';
    public const TWOS = 'twos';
    public const THREES = 'threes';
    public const FOURS = 'fours';
    public const FIVES = 'fives';
    public const SIXES = 'sixes';
    public const FULL_HOUSE = 'full house';
    public const FOUR_OF_A_KIND = 'four of a kind';
    public const LITTLE_STRAIGHT = 'little straight';
    public const BIG_STRAIGHT = 'big straight';
    public const CHOICE = 'choice';
    public const YACHT = 'yacht';

    public function score(array $rolls, string $category): int
    {
        return match ($category) {
            self::ONES, self::TWOS, self::THREES, self::FOURS, self::FIVES, self::SIXES => $this->digits($rolls, $category),
            self::FULL_HOUSE => $this->full_house($rolls),
            self::FOUR_OF_A_KIND => $this->four_of_a_kind($rolls),
            self::LITTLE_STRAIGHT, self::BIG_STRAIGHT => $this->straight($rolls, $category),
            self::CHOICE => $this->choice($rolls),
            self::YACHT => $this->yacht($rolls),
        };
    }

    public function digits(array $rolls, string $category): int
    {
        $counts = array_count_values($rolls);
        $digit = match ($category) {
            self::ONES => 1,
            self::TWOS => 2,
            self::THREES => 3,
            self::FOURS => 4,
            self::FIVES => 5,
            self::SIXES => 6
        };

        return ($counts[$digit] ?? 0) * $digit;
    }

    public function full_house(array $rolls): int
    {
        $counts = array_count_values($rolls);

        return in_array(3, $counts) && in_array(2, $counts) ? array_sum($rolls) : 0;
    }

    public function four_of_a_kind(array $rolls): int
    {
        $counts = array_count_values($rolls);
        [$a, $b, $c] = $rolls;
        $four = $a === $b ? $a : ($a === $c ? $a : $b);

        return in_array(4, $counts) || in_array(5, $counts) ? $four * 4 : 0;
    }

    public function straight(array $rolls, string $category): int
    {
        $counts = array_count_values($rolls);
        if (count($counts) !== 5) {
            return 0;
        }

        return match ($category) {
            self::LITTLE_STRAIGHT => min(...$rolls) === 1 && max(...$rolls) === 5 ? 30 : 0,
            self::BIG_STRAIGHT => min(...$rolls) === 2 && max(...$rolls) === 6 ? 30 : 0,
        };
    }

    public function choice(array $rolls): int
    {
        return array_sum($rolls);
    }

    public function yacht(array $rolls): int
    {
        return array_sum($rolls) === $rolls[0] * 5 ? 50 : 0;
    }
}