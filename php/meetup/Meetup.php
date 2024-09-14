<?php declare(strict_types=1);

function meetup_day(int $year, int $month, string $which, string $weekday): DateTimeImmutable
{
    $first = DateTimeImmutable::createFromFormat("Y-m-d", "$year-$month-01");
    switch($which) {
        case 'first':
            return $first->modify("this $weekday");
        case 'second':
            return $first->modify("this $weekday, +7 days");
        case 'third':
            return $first->modify("this $weekday, +14 days");
        case 'fourth':
            return $first->modify("this $weekday, +21 days");
        case 'last':
            $next = $first->modify("next month");
            return $next->modify("last $weekday");
        case 'teenth':
            $thirteenth = $first->modify("+12 days");
            return $thirteenth->modify("this $weekday");
    }
}
