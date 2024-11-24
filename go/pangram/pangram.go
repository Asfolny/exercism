package pangram

import (
    "slices"
    "strings"
)

func IsPangram(input string) bool {
	input = strings.ToLower(input)
    must_see := []rune{
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
        'n', 'o', 'p', 'q', 'r', 's', 't', 'u','v', 'w', 'x', 'y', 'z',
    }
    for _, char := range input {
        if char == ' ' {
            continue
        }

        if idx := slices.Index(must_see, char); idx != -1 {
            // range has exclusive end
            must_see = slices.Delete(must_see, idx, idx+1)
        }
    }

    return len(must_see) == 0
}
