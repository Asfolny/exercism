#!/usr/bin/env bash
GLOBIGNORE="*"
shopt -s extglob

IN=$@
OUT=()

for PART in $IN; do
    if [[ $PART == a* ]] || \
        [[ $PART == e* ]] || \
        [[ $PART == i* ]] || \
        [[ $PART == o* ]] || \
        [[ $PART == u* ]] || \
        [[ $PART == xr* ]] || \
        [[ $PART == yt* ]]; then
        OUT+=("${PART}ay")
        continue
    fi
    
    if [[ $PART =~ (.*qu) ]]; then
        prefix=${BASH_REMATCH[1]}
        OUT+=("${PART##$prefix}${prefix}ay")
        continue
    fi
    
    if [[ $PART =~ ([b-df-hj-np-tv-z]+)[aeiou].* ]]; then
        prefix=${BASH_REMATCH[1]}
        OUT+=("${PART##$prefix}${prefix}ay")
        continue
    fi
    
    if [[ $PART =~ ([b-df-hj-np-tv-z]+)y.* ]]; then
        prefix=${BASH_REMATCH[1]}
        OUT+=("${PART##$prefix}${prefix}ay")
        continue
    fi
done

echo "${OUT[@]}"
exit 0