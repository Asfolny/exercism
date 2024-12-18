#!/usr/bin/env bash

LIMIT=$1
RES=()
MARKED=()

if [[ LIMIT -lt 2 ]]; then
    echo "${RES[@]}";
    exit 0;
fi

for (( i=2; i <= LIMIT; i++ )); do
    if [[ $(echo "${MARKED[@]}" | grep -F -w $i) ]]; then
        continue
    fi

    RES+=($i)

    for (( j=i+i; j <= LIMIT; j += i )); do
        MARKED+=($j)
    done
done

echo "${RES[@]}"