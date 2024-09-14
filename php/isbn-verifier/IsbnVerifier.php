<?php declare(strict_types=1);

class IsbnVerifier
{
    public function isValid(string $isbn): bool
    {
        $isbn = str_replace('-', '', $isbn);
        if (preg_match('/^\d{9}[\dX]$/', $isbn) === 0)
            return false;
        $sum = 0;
        
        for ($i = 0; $i < strlen($isbn); $i++) {
            $point = $isbn[$i];
            if ($point === "X")
                $point = 10;
            $sum += (int)$point * (strlen($isbn) - $i);
        }
        
        return $sum % 11 === 0;
    }
}
