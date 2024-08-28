<?php declare(strict_types=1);

class Proverb
{
    public function recite(array $words = []): array
    {
        $proverb = [];
        while($currentWord = current($words)) {
            $nextWord = next($words);

            if ($nextWord) {
                $proverb[] = "For want of a $currentWord the $nextWord was lost.";
            }
        }

        reset($words); // Reset to get the first again for the final line
        if ($currentWord = current($words)) {
            $proverb[] = "And all for the want of a $currentWord.";
        }
        
        return $proverb;
    }
}
