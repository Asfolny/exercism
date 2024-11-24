module LuciansLusciousLasagna

let expectedMinutesInOven = 40

let remainingMinutesInOven minutesIn = expectedMinutesInOven - minutesIn

let preparationTimeInMinutes layers = layers * 2

let elapsedTimeInMinutes layers minutesIn = 
    let layerTime = preparationTimeInMinutes layers
    layerTime + minutesIn
