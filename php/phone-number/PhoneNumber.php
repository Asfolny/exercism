<?php declare(strict_types=1);

class PhoneNumber
{
    public function __construct(private string $num) {
                // This could've just been a preg_replace all non-numbers...
        // But desired is more fine-grained control over the errors
        $number = str_replace(["+", ".", "-", "(", ")", " "], "", $num);
        if (strlen($number) > 11)
            throw new InvalidArgumentException("more than 11 digits");
        if (strlen($number) < 10)
            throw new InvalidArgumentException("incorrect number of digits");

        if (strlen($number) === 11) {
            if ($number[0] !== "1")
                throw new InvalidArgumentException("11 digits must start with 1");

            $number = substr($number, 1); // Strip away the country-code
        }

        array_map(fn($char) => ctype_alpha($char) ? throw new InvalidArgumentException("letters not permitted") : $char, str_split($number));

        array_map(fn($char) => ctype_punct($char) ? throw new InvalidArgumentException("punctuations not permitted") : $char, str_split($number));

        foreach (str_split($number) as $i => $char) {
            $num = (int)$char;
            if ($i === 0) {
                if ($num < 2) {
                    // "-" is stripped, cannot be negative
                    if ($num == 0)
                        throw new InvalidArgumentException("area code cannot start with zero");
                    
                    throw new InvalidArgumentException("area code cannot start with one");
                }
            }

            if ($i === 3) {
                if ($num < 2) {
                    // "-" is stripped, cannot be negative
                    if ($num == 0)
                        throw new InvalidArgumentException("exchange code cannot start with zero");

                    throw new InvalidArgumentException("exchange code cannot start with one");
                }
            }
        }

        $this->num = $number;
    }

    public function number(): string
    {
        return $this->num;
    }
}
