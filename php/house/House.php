<?php declare(strict_types=1);

class House
{
    private const PRESENT_LINES = [
        "This is the house that Jack built.",
        "This is the malt",
        "This is the rat",
        "This is the cat",
        "This is the dog",
        "This is the cow with the crumpled horn",
        "This is the maiden all forlorn",
        "This is the man all tattered and torn",
        "This is the priest all shaven and shorn",
        "This is the rooster that crowed in the morn",
        "This is the farmer sowing his corn",
        "This is the horse and the hound and the horn"
    ];

    private const PAST_LINES = [
        "that lay in the house that Jack built.",
        "that ate the malt",
        "that killed the rat",
        "that worried the cat",
        "that tossed the dog",
        "that milked the cow with the crumpled horn",
        "that kissed the maiden all forlorn",
        "that married the man all tattered and torn",
        "that woke the priest all shaven and shorn",
        "that kept the rooster that crowed in the morn",  
        "that belonged to the farmer sowing his corn",
    ];
    
    public function verse(int $verseNumber): array
    {
        $v = [self::PRESENT_LINES[$verseNumber - 1]];

        for ($i = $verseNumber - 1; $i > 0; $i--)
             $v[] = self::PAST_LINES[$i - 1];

        return $v;
    }

    public function verses(int $start, int $end): array
    {
        $vs = [];
        
        for($i = $start; $i <= $end; $i++) {
            $vs = array_merge($vs, $this->verse($i));
            $vs[] = "";
        }
        
        array_pop($vs); // Remove the final empty element
        return $vs;
    }
}
