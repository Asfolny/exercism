<?php declare(strict_types=1);

class Bob
{
    public function respondTo(string $str): string
    {
        $str = trim($str);
        
        return match(true) {
            mb_substr($str, -1) === "?" => 
                match(true) {
                    !preg_match('/[a-z]/', $str) && preg_match('/[A-Z]+/', $str) => "Calm down, I know what I'm doing!",
                    default => "Sure."
                },
            !preg_match('/[a-z]/', $str) && preg_match('/[A-Z]+/', $str) => 'Whoa, chill out!',
            strlen($str) === 0 => 'Fine. Be that way!',
            default => "Whatever."
        };
    }
}
