//
// This is only a SKELETON file for the 'Anagram' exercise. It's been provided as a
// convenience to get you started writing code faster.
//

export const findAnagrams = (word, list) => {
  const anagrams = []
  const wordArr = word.toLowerCase().split('')
  wordArr.sort()
  
listLoop: for (const candidate of list) {
    const arr = candidate.toLowerCase().split('')
    arr.sort()

    if (wordArr.length != arr.length || word.toLowerCase() === candidate.toLowerCase()) {
      continue
    }

    for (let i = 0; i < arr.length; i++) {
      if (wordArr[i] !== arr[i]) {
        continue listLoop
      }
    }

    anagrams.push(candidate)
  }

  return anagrams
}
