module CarsAssemble

open System

let hourlyProduction = 221

let successRate (speed: int): float =
    match speed with
    | s when s < 1 -> 0.0
    | s when s <= 4 -> 1.0
    | s when s <= 8 -> 0.9
    | s when s = 9 -> 0.8
    | _ -> 0.77

let productionRatePerHour (speed: int): float =
    (float speed) * (float hourlyProduction) * (successRate speed)

let workingItemsPerMinute (speed: int): int =
    (int (Math.Floor ((productionRatePerHour speed) / 60.0)))
