<?php declare(strict_types=1);

function language_list(string ...$items): array
{
    return $items;
}

function add_to_language_list(array $in, string $new): array
{
    return [...$in, $new];
}

function prune_language_list(array $in): array
{
    return array_slice($in, 1);
}

function current_language(array $in): string
{
    return current($in);
}

function language_list_length(array $in): int
{
    return count($in);
}