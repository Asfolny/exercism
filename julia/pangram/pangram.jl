"""
    ispangram(input)

Return `true` if `input` contains every alphabetic character (case insensitive).

"""
function ispangram(input)
    letterSet = Set()
    
    for c in input
        if 'A' <= c <= 'Z'
            c += 32
        end
        if 'a' <= c <= 'z'
            push!(letterSet, c)
        end
    end

    return length(letterSet) == 26
end

