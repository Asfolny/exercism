module Allergies exposing (Allergy(..), isAllergicTo, toList)
import Bitwise

type Allergy
    = Eggs
    | Peanuts
    | Shellfish
    | Strawberries
    | Tomatoes
    | Chocolate
    | Pollen
    | Cats


isAllergicTo : Allergy -> Int -> Bool
isAllergicTo allergy score =
    case allergy of
    Eggs -> Bitwise.and 1 score /= 0
    Peanuts -> Bitwise.and 2 score /= 0
    Shellfish -> Bitwise.and 4 score /= 0
    Strawberries -> Bitwise.and 8 score /= 0
    Tomatoes -> Bitwise.and 16 score /= 0
    Chocolate -> Bitwise.and 32 score /= 0
    Pollen -> Bitwise.and 64 score /= 0
    Cats -> Bitwise.and 128 score /= 0
    


toList : Int -> List Allergy
toList score =
    doCheckList score Cats
    
doCheckList : Int -> Allergy -> List Allergy
doCheckList score allergy =
    case allergy of 
    Eggs -> if isAllergicTo allergy score then
                [Eggs]
            else
                []
    Peanuts -> if isAllergicTo allergy score then
                doCheckList score Eggs ++ [Peanuts]
            else
                doCheckList score Eggs
    Shellfish -> if isAllergicTo allergy score then
                doCheckList score Peanuts ++ [Shellfish]
            else
                doCheckList score Peanuts
    Strawberries -> if isAllergicTo allergy score then
                doCheckList score Shellfish ++ [Strawberries]
            else
                doCheckList score Shellfish
    Tomatoes -> if isAllergicTo allergy score then
                doCheckList score Strawberries ++ [Tomatoes]
            else
                doCheckList score Strawberries
    Chocolate -> if isAllergicTo allergy score then
                doCheckList score Tomatoes ++ [Chocolate]
            else
                doCheckList score Tomatoes
    Pollen -> if isAllergicTo allergy score then
                doCheckList score Chocolate ++ [Pollen]
            else
                doCheckList score Chocolate
    Cats -> if isAllergicTo allergy score then
                doCheckList score Pollen ++ [Cats]
            else
                doCheckList score Pollen