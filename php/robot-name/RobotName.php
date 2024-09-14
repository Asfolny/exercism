<?php declare(strict_types=1);

global $usedNames;
$usedNames = [];

class Robot
{
    private $name;
    public function getName(): string
    {
        if (!$this->name) {
            
            $this->name = $this->_getRandomName();
        }

        return $this->name;
    }

    public function reset(): void
    {
        $this->name = null;
        
    }

    private function _getRandomName(): string
    {
        global $usedNames;
        $possible = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $char1 = $possible[mt_rand(0, strlen($possible)-1)];
        $char2 = $possible[mt_rand(0, strlen($possible)-1)];
        $randomDigit1 = mt_rand(0, 9);
        $randomDigit2 = mt_rand(0, 9);
        $randomDigit3 = mt_rand(0, 9);
        $name = "{$char1}{$char2}{$randomDigit1}{$randomDigit2}{$randomDigit3}";
        
        if (in_array($name, $usedNames)) {
            $name = $this->_getRandomName();
        }
        
        $usedNames[] = $name;
        return $name;
    }
}
