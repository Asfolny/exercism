<?php declare(strict_types=1);

class TwelveDays
{
    public const DAY_CONTENT = [
        "a Partridge in a Pear Tree",
        "two Turtle Doves",
        "three French Hens",
        "four Calling Birds",
        "five Gold Rings",
        "six Geese-a-Laying",
        "seven Swans-a-Swimming",
        "eight Maids-a-Milking",
        "nine Ladies Dancing",
        "ten Lords-a-Leaping",
        "eleven Pipers Piping",
        "twelve Drummers Drumming"
    ];
    public function recite(int $start, int $end): string
    {
        $result = [];
        for ($i = $start; $i <= $end; $i++) {
            $result[] = $this->constructLine($i);
        }

        return implode(PHP_EOL, $result);
    }

    public function constructLine(int $line): string
    {
        $result = "On the {$this->intToStringOrder($line)} day of Christmas my true love gave to me:";
        $content = array_slice(self::DAY_CONTENT, 0, $line);
        $first = array_shift($content);
        $contentStr = implode(", ", array_reverse($content));
        if ($line === 1) {
            return "$result $first.";
        }
        
        return "$result $contentStr, and $first.";
    }

    public function intToStringOrder(int $int): string
    {
        switch($int) {
            case 1:
                return "first";
            case 2:
                return "second";
            case 3:
                return "third";
            case 4:
                return "fourth";
            case 5:
                return "fifth";
            case 6:
                return "sixth";            
            case 7:
                return "seventh";
            case 8:
                return "eighth";
            case 9:
                return "ninth";
            case 10:
                return "tenth";
            case 11:
                return "eleventh";
            case 12:
                return "twelfth";
            default:
                throw new \Exception("Not a known order");
        }
    }
}
