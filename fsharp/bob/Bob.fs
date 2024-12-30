module Bob

open System.Text.RegularExpressions
open System

let isShouting (input: string): bool =
    Regex.IsMatch(input, @"[A-Z]+") && String.Equals(input.ToUpper(), input, StringComparison.Ordinal)

let isQuestion (input: string): bool = Regex.IsMatch(input, @"\?$")

let response (input: string): string = 
    let sanitized = input.Replace(" ", "").Replace("\n", "").Replace("\t", "").Replace("\r", "")

    if isShouting sanitized && isQuestion sanitized then "Calm down, I know what I'm doing!"
    elif isShouting sanitized then "Whoa, chill out!"
    elif isQuestion sanitized then "Sure."
    elif (String.length sanitized) = 0 then "Fine. Be that way!"
    else "Whatever."