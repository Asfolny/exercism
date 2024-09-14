<?php declare(strict_types=1);

class Strain
{
    public function keep(array $list, callable $predicate): array
    {
        $r = [];
        foreach($list as $item) {
            if ($predicate($item))
                $r[] = $item;
        }

        return $r;
    }

    public function discard(array $list, callable $predicate): array
    {
        $r = [];
        foreach($list as $item) {
            if (!$predicate($item))
                $r[] = $item;
        }

        return $r;
    }
}
