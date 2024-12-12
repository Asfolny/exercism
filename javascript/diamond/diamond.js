//
// This is only a SKELETON file for the 'Diamond' exercise. It's been provided as a
// convenience to get you started writing code faster.
//

export const rows = (letter) => {
  const uppercases = new Array(26).fill(1).map((_, i) => String.fromCharCode(65 + i))

  if (!uppercases.includes(letter)) {
    throw new Error("letter is not a valid ascii uppercase")
  }

  const diamond = []
  const length = uppercases.indexOf(letter) * 2 + 1

  for (let i = 0; i < Math.ceil(length / 2); i++) {
    const letter_positions = i > 0 ? 
      [Math.floor(length / 2) - i, Math.floor(length / 2) + i] :
      [Math.floor(length / 2)]
    const row = []

    for (let j = 0; j < length; j++) {
      const point = letter_positions.includes(j) ? uppercases[i] : " "
      row.push(point)
    }

    diamond.push(row.join(''))
  }

  for (let i = Math.floor(length / 2); i > 0; i--) {
    const letter_positions = i > 1 ?
      [Math.ceil(length / 2) - i, Math.floor(length / 2) + i-1] :
      [Math.floor(length / 2)]
    const row = []

    for (let j = 0; j < length; j++) {
      const point = letter_positions.includes(j) ? uppercases[i-1] : " "
      row.push(point)
    }

    diamond.push(row.join(''))
  }

  return diamond
}