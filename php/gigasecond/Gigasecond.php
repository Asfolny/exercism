<?php declare(strict_types=1);

function from(DateTimeImmutable $date): DateTimeImmutable
{
    $gs = 1_000_000_000;
    return $date->add(new \DateInterval("PT{$gs}S"));
}
