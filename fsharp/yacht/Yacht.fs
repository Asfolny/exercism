module Yacht

type Category = 
    | Ones
    | Twos
    | Threes
    | Fours
    | Fives
    | Sixes
    | FullHouse
    | FourOfAKind
    | LittleStraight
    | BigStraight
    | Choice
    | Yacht

type Die =
    | One 
    | Two 
    | Three
    | Four 
    | Five 
    | Six

let dieToNum (die: Die): int =
    match die with
    | One -> 1
    | Two -> 2
    | Three -> 3
    | Four -> 4
    | Five -> 5
    | Six -> 6
    
let doFullHouse (dice: List<Die>): int =
    let mutable one: Option<Die> = None
    let mutable oneCount = 1
    let mutable two: Option<Die> = None
    let mutable twoCount = 1

    let rec check' d =
        match d with
        | [] -> ()
        | h::t ->
            if one = None then one <- Some h
            elif two = None && (Option.get one) <> h then two <- Some h
            elif (Option.get one) = h then oneCount <- oneCount + 1
            elif (Option.get two) = h then twoCount <- twoCount + 1
            check' t

    check' dice

    match oneCount, twoCount with
    | 3, 2 | 2, 3 -> 
        (dieToNum (Option.get one)) * oneCount + (dieToNum (Option.get two)) * twoCount
    | _, _ -> 0

let doFourOfKind (dice: List<Die>): int =
    let mutable one: Option<Die> = None
    let mutable oneCount = 1
    let mutable two: Option<Die> = None
    let mutable twoCount = 1

    let rec check' d =
        match d with
        | [] -> ()
        | h::t ->
            if one = None then one <- Some h
            elif two = None && (Option.get one) <> h then two <- Some h
            elif (Option.get one) = h then oneCount <- oneCount + 1
            elif (Option.get two) = h then twoCount <- twoCount + 1
            check' t

    check' dice

    match oneCount, twoCount with
    | c, _ when c >= 4 -> (dieToNum (Option.get one)) * 4
    | _, c when c >= 4 -> (dieToNum (Option.get two)) * 4
    | _, _ -> 0

let rec doCmpList l1 l2 =
    match l1, l2 with
    | [], [] -> true
    | x::xs, y::ys -> if x <> y then false else doCmpList xs ys
    | _, _ -> false

let score (category: Category) (dice: List<Die>): int = 
    match category with
    | Ones -> List.filter (fun die -> die = One) dice |> List.length
    | Twos -> List.filter (fun die -> die = Two) dice |> List.length |> (*) 2
    | Threes -> List.filter (fun die -> die = Three) dice |> List.length |> (*) 3
    | Fours -> List.filter (fun die -> die = Four) dice |> List.length |> (*) 4
    | Fives -> List.filter (fun die -> die = Five) dice |> List.length |> (*) 5
    | Sixes -> List.filter (fun die -> die = Six) dice |> List.length |> (*) 6
    | FullHouse -> doFullHouse dice
    | FourOfAKind -> doFourOfKind dice
    | LittleStraight -> List.sort dice |> (fun sorted -> if sorted = [One; Two; Three; Four; Five] then 30 else 0)
    | BigStraight -> List.sort dice |> (fun sorted -> if sorted = [Two; Three; Four; Five; Six] then 30 else 0)
    | Choice -> List.map (dieToNum) dice |> List.reduce (+)
    | Yacht ->
        if (doCmpList dice [One; One; One; One; One] ||
            doCmpList dice [Two; Two; Two; Two; Two] ||
            doCmpList dice [Three; Three; Three; Three; Three] ||
            doCmpList dice [Four; Four; Four; Four; Four] ||
            doCmpList dice [Five; Five; Five; Five; Five] ||
            doCmpList dice [Six; Six; Six; Six; Six]) then 50 else 0