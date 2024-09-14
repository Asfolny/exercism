<?php declare(strict_types=1);

class RotationalCipher
{
    public function rotate(string $text, int $shift): string
    {
        if ($shift < 1 || $shift >= 26)
            return $text;

        $enc = "";
        foreach(str_split($text) as $char) {
            $o = ord($char);
            if ($o >= 65 && $o <= 90) {
                // Capital letter
                $pos = $o - 65;
                $e = ($pos + $shift) % 26;
                $char = chr($e + 65);
            }


            if ($o >= 97 && $o <= 122) {
                // Lower case
                $pos = $o - 97;
                $e = ($pos + $shift) % 26;
                $char = chr($e + 97);
            }

            // Anything else
            $enc .= $char;
        }

        return $enc;
    }
}
