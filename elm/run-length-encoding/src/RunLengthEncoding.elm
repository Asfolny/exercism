module RunLengthEncoding exposing (decode, encode)

import Parser exposing (Parser, Step(..), (|=))


encode : String -> String
encode =
    String.foldl encodeChar [] >> List.foldl show ""

encodeChar : Char -> List (Int, Char) -> List (Int, Char)
encodeChar char hist =
    case hist of
        [] -> [(1, char)]
        (n, runningChar) :: rest -> 
            if runningChar == char
                then (n+1, runningChar) :: rest
                else (1, char) :: hist

show : (Int, Char) -> String -> String
show (n, char) = if n == 1
    then String.cons char
    else (++) (String.fromInt n ++ String.fromChar char)

decode : String -> String
decode = Parser.run (Parser.loop "" decoder) >> Result.withDefault ""

decoder : String -> Parser (Step String String)
decoder soFar =
    Parser.oneOf [
        Parser.succeed (\n char -> soFar ++ String.repeat n char |> Loop)
        |= Parser.oneOf [ Parser.int, Parser.succeed 1 ]
        |= (Parser.chompIf (always True) |> Parser.getChompedString),
        Parser.succeed (Done soFar)
    ]