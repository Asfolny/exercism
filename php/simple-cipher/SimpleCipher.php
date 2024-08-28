<?php declare(strict_types=1);

class SimpleCipher
{
    private const LENGTH = 100;
    private const SET = 'abcdefghijklmnoqprstuvwxyz';
    
    public function __construct(public ?string $key = null)
    {
        if ($key === null) {
            for($i = 0; $i < self::LENGTH; $i++) {
                $this->key .= self::SET[rand(0, strlen(self::SET) - 1)];
            } 
        }

        if (strlen($this->key) === 0
            || strtolower($this->key) !== $this->key 
            || preg_match('/([^a-z])/', $this->key)) {
            throw new \InvalidArgumentException('Only lowercase keys are support');
        }
    }

    public function encode(string $plainText): string
    {
        $encoded = '';
        
        for($i = 0; $i < strlen($plainText); $i++) {
            $textAlphaOrd = ord($plainText[$i]) % 97;
            $keyOrdDiff = ord($this->key[$i]) % 97;

            $newAlphaOrd = ($textAlphaOrd + $keyOrdDiff) % 26;
            $encoded .= chr($newAlphaOrd + 97);
        }

        return $encoded;
    }

    public function decode(string $cipherText): string
    {
        $decoded = '';

        for($i = 0; $i < strlen($cipherText); $i++) {
            $textAlphaOrd = ord($cipherText[$i]) % 97;
            $keyOrdDiff = ord($this->key[$i]) % 97;

            $newAlphaOrd = ($textAlphaOrd - $keyOrdDiff) % 26;

            // A better alternative is the gmp_mod function which does this with the call, found in the GMP extension
            if ($newAlphaOrd < 0) {
                $newAlphaOrd += 26;
            }
            
            $decoded .= chr($newAlphaOrd + 97);
        }

        return $decoded;
    }
}
