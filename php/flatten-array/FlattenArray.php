<?php declare(strict_types=1);

function flatten(array $input): array
{
    $flat = [];

    foreach($input as $item) {
        switch (gettype($item)) {
            case "NULL":
                // Do nothing
                break;
            case "array":
                $flat = array_merge($flat, flatten($item));
                break;
            default:
                $flat[] = $item;
        }
    }

    return $flat;
}
