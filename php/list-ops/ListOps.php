<?php declare(strict_types=1);

class ListOps
{
    public function append(array $list1, array $list2): array
    {
        foreach($list2 as $item)
            $list1[] = $item;

        return $list1;
    }

    public function concat(array $list1, array ...$listn): array
    {
        foreach($listn as $list)
            foreach($list as $item)
                $list1[] = $item;

        return $list1;
    }

    /**
     * @param callable(mixed $item): bool $predicate
     */
    public function filter(callable $predicate, array $list): array
    {
        $r = [];
        foreach($list as $item) {
            if ($predicate($item))
                $r[] = $item;
        }

        return $r;
    }

    public function length(array $list): int
    {
        $len = 0;
        foreach($list as $_)
            $len++;

        return $len;
    }

    /**
     * @param callable(mixed $item): mixed $function
     */
    public function map(callable $function, array $list): array
    {
        foreach($list as $key => $item)
            $list[$key] = $function($item);

        return $list;
    }

    /**
     * @param callable(mixed $accumulator, mixed $item): mixed $function
     */
    public function foldl(callable $function, array $list, $accumulator)
    {
        foreach($list as $item)
            $accumulator = $function($accumulator, $item);

        return $accumulator;
    }

    /**
     * @param callable(mixed $accumulator, mixed $item): mixed $function
     */
    public function foldr(callable $function, array $list, $accumulator)
    {
        $rev = $this->reverse($list);
        foreach($rev as $item)
            $accumulator = $function($accumulator, $item);

        return $accumulator;
    }

    public function reverse(array $list): array
    {
        $r = [];
        foreach($list as $item)
            array_unshift($r, $item);

        return $r;
    }
}
