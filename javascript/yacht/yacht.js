//
// This is only a SKELETON file for the 'Yacht' exercise. It's been provided as a
// convenience to get you started writing code faster.
//

export const score = (dices, category) => {
  let checker = null
  let n1 = null
  let n2 = null
  let n1_count = 1
  let n2_count = 1

  switch (category) {
    case 'yacht':
      for (const die of dices) {
        if (die !== dices[0]) {
          return 0
        }
      }
      
      return 50

    case 'ones':
      checker = 1
    case 'twos':
      if (checker === null) {
        checker = 2
      }
    case 'threes':
      if (checker === null) {
        checker = 3
      }
    case 'fours':
      if (checker === null) {
        checker = 4
      }
    case 'fives':
      if (checker === null) {
        checker = 5
      }
    case 'sixes':
      if (checker === null) {
        checker = 6
      }
      let r = 0

      for (const die of dices) {
        if (die === checker) {
          r += checker
        }
      }

      return r

    case 'full house':
      for (const n of dices) {
        if (n1 === null) {
          n1 = n
          continue
        }
        if (n === n1) {
          n1_count++
          continue
        }
  
        if (n2 === null) {
          n2 = n
          continue
        }
        if (n == n2) {
          n2_count++
          continue
        }
  
        if (n !== n1 && n !== n2) {
          return 0
        }
      }

      return n1_count == 3 || n2_count == 3 ?
        dices.reduce((acc, current) => acc + current, 0) : 0

    case 'four of a kind':
      for (const n of dices) {
        if (n1 === null) {
          n1 = n
          continue
        }
        if (n === n1) {
          n1_count++
          continue
        }
  
        if (n2 === null) {
          n2 = n
          continue
        }
        if (n == n2) {
          n2_count++
          continue
        }
  
        if (n !== n1 && n !== n2) {
          return 0
        }
      }

      if (n1_count >= 4) {
        return n1 * 4
      }

      if (n2_count >= 4) {
        return n2 * 4
      }

      return 0

    case 'little straight':
      checker = [1, 2, 3, 4, 5]
    case 'big straight':
      if (checker === null) {
        checker = [2, 3, 4, 5, 6]
      }

      dices.sort()
      return JSON.stringify(checker) === JSON.stringify(dices) ? 30 : 0
    case 'choice':
      return dices.reduce((acc, current) => acc + current, 0)
  }
};
