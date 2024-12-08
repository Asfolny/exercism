Function Get-Acronym() {
    <#
    .SYNOPSIS
    Get the acronym of a phrase.

    .DESCRIPTION
    Given a phrase, return the string acronym of that phrase.
    "As Soon As Possible" => "ASAP"
    
    .PARAMETER Phrase
    The phrase to get the acronym from.
    
    .EXAMPLE
    Get-Acronym -Phrase "As Soon As Possible"
    #>
    [CmdletBinding()]
    Param (
        [string]$Phrase
    )

    $acronym = ""
    $Phrase = $Phrase.replace("-", " ").replace("_", " ")

    foreach ($word in $Phrase.split(" ")) {
        $acronym = $acronym + "$($word[0])".ToUpper()
    }

    return $acronym
}