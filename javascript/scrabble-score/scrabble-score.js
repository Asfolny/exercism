//
// This is only a SKELETON file for the 'Scrabble Score' exercise. It's been provided as a
// convenience to get you started writing code faster.
//

export const score = (word) => {
  const pointToLetter = {
    1: ["A", "E", "I", "O", "U", "L", "N", "R", "S", "T"],
    2: ["D", "G"],
    3: ["B", "C", "M", "P"],
    4: ["F", "H", "V", "W", "Y"],
    5: ["K"],
    8: ["J", "X"],
    10: ["Q", "Z"]
  };

  let score = 0
  for (const char of word.toUpperCase().split('')) {
    for (const [val, letters] of Object.entries(pointToLetter)) {
      if (letters.includes(char)) {
        score += Number(val);
      }
    }
  }

  return score
};
