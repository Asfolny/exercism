module RnaTranscription exposing (toRNA)

import Dict


complements : Dict.Dict Char Char
complements =
    Dict.fromList [ ( 'G', 'C' ), ( 'C', 'G' ), ( 'T', 'A' ), ( 'A', 'U' ) ]


toRNA : String -> Result String String
toRNA =
    String.toList
        >> List.map (\n -> Dict.get n complements)
        >> List.foldr (Maybe.map2 String.cons) (Just "")
        >> Result.fromMaybe "Invalid input"