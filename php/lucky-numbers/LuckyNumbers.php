<?php declare(strict_types=1);

class LuckyNumbers
{
    public function sumUp(array $digitsOfNumber1 = [], array $digitsOfNumber2 = []): int
    {
        return (int)implode('', $digitsOfNumber1) + (int)implode('', $digitsOfNumber2);
    }

    public function isPalindrome(int $number): bool
    {
        // Convert the number to a string and split it off into an array of each number
        // The number being a string character does not matter for the rest of this function
        $line = preg_split(
            '/([0-9])/',
            (string)$number,
            flags: PREG_SPLIT_NO_EMPTY 
            | PREG_SPLIT_DELIM_CAPTURE
        );
        
        // A palindrome of odd length can ignore the exact middle point
        $skipMid = count($line) % 2;
        
        $leftClosure = $skipMid ? floor(...) : ceil(...);
        $left = array_slice(
            $line,
            0,
            (int)$leftClosure(count($line) / 2)
        );
        
        $rightClosure = $skipMid ? ceil(...) : floor(...);
        $right = array_slice(
            $line,
            (int)$rightClosure(count($line) / 2)
        );

        return $left === array_reverse($right);
    }

    public function validate(string $input): string
    {
        if (strlen($input) < 1) {
            return 'Required field';
        }

        return (int)$input > 0 ? '' : 'Must be a whole number larger than 0';
    }
}
