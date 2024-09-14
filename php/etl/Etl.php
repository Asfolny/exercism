<?php declare(strict_types=1);

function transform(array $input): array
{
    $r = [];
    foreach($input as $score => $letters) {
        $score = (int)$score;
        if ($score < 1)
            throw new InvalidArgumentException("Each letter must be at least 1 point");
        if (empty($letters))
            throw new InvalidArgumentException("Score contains no letters");
        
        foreach($letters as $letter) {
            $r[strtolower($letter)] = $score;
        }
    }

    return $r;
}
