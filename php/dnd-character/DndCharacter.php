<?php declare(strict_types=1);

class DndCharacter
{
    public function __construct(
        public int $strength,
        public int $dexterity,
        public int $constitution,
        public int $intelligence,
        public int $wisdom,
        public int $charisma,
        public int $hitpoints
    ) {}

    public static function modifier(int $mod): int
    {
        return (int)floor(($mod - 10) / 2);
    }

    public static function ability(): int
    {
        $rolls = [
            rand(1, 6),
            rand(1, 6),
            rand(1, 6),
            rand(1, 6),
        ];
        rsort($rolls);
        return array_sum(array_slice($rolls, 0, 3));
    }

    public static function generate(): self
    {
        $constitution = self::ability();
        return new self(
            self::ability(),
            self::ability(),
            $constitution,
            self::ability(),
            self::ability(),
            self::ability(),
            10 + self::modifier($constitution)
        );
    }
}
