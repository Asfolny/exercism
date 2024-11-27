proc abbreviate {phrase} {
    variable acronym ""
    variable phrases
    
    set phrase [string map {"-" " "} $phrase]
    set phrase [string map {"_" " "} $phrase]
    
    foreach word [split $phrase " "] {
        set acronym $acronym[string toupper [string index $word 0]]
    }

    return $acronym
}