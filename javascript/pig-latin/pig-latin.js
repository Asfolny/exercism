//
// This is only a SKELETON file for the 'Pig Latin' exercise. It's been provided as a
// convenience to get you started writing code faster.
//

export const translate = (text) => {
  const words = text.split(' ')
  
  for (let [index, word] of words.entries()) {
    if (!['a', 'e', 'i', 'o', 'u'].includes(word[0]) && !['xr', 'yt'].includes(word.substring(0, 2))) {
        word = shift(word)
    }
    
    words[index] = `${word}ay`
    console.log(word, index, text)
  }

  return words.join(' ')
}

const shift = (word) => {
  word = word.split('')
  word.push(word.shift())

  if (word[0] == 'u' && word[word.length-1] == 'q') {
    word.push(word.shift())
    return word.join('')
  }

  if (['a', 'e', 'i', 'o', 'u', 'y'].includes(word[0])) {
    return word.join('')
  }

  return shift(word.join(''))
}