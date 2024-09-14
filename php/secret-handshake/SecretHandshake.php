<?php declare(strict_types=1);

class SecretHandshake
{
    public function commands(int $handshake): array
    {
        $instructions = [];

        if (0b00001 & $handshake) {
            $instructions[] = "wink";
        }

        if (0b00010 & $handshake) {
            $instructions[] = "double blink";
        }

        if (0b00100 & $handshake) {
            $instructions[] = "close your eyes";
        }

        if (0b01000 & $handshake) {
            $instructions[] = "jump";
        }

        if (0b10000 & $handshake) {
            $instructions = array_reverse($instructions);
        }

        return $instructions;
    }
}
