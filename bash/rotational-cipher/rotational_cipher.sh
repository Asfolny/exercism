#!/usr/bin/env bash
# Uncomment for debugging
#set -x

ciphertext=$1
rot=$2

for letter in {a..z}; do
    alphabet+=( "${letter}" )
done

for ((i=rot; i<"${#alphabet[@]}"; i++)); do
    codebook+=( "${alphabet[i]}" )
done

for ((i=0; i<"${rot}"; i++)); do
    codebook+=( "${alphabet[i]}" )
done

for ((i=0; i<"${#ciphertext}"; i++)); do
    cipher_letter="${ciphertext:$i:1}"
    if [[ "$cipher_letter" == [[:digit:]] ]] || [[ "$cipher_letter" == [[:punct:]] ]] || [[ "$cipher_letter" == " " ]]; then
        decrypt+="$cipher_letter"
    else
        for j in "${!alphabet[@]}"; do
            if [[ "${alphabet[$j]}" == "$cipher_letter" ]]; then
                decrypt+="${codebook[$j]}"
            elif [[ "${alphabet[$j]}" == "${cipher_letter,,}" ]]; then
                decrypt_letter="${codebook[$j]}"
                decrypt+="${decrypt_letter^^}"
            fi
        done
    fi
done

echo $decrypt