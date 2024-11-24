export const isIsogram = (word) => {
  // Strip allowed repeats and lowercase
  word = word.replace(' ', '').replace('-', '').toLowerCase()

  const known = []
  for (const letter of word.split('')) {
    if (known.includes(letter)) {
      return false
    }

    known.push(letter)
  }
  
  return true
}
