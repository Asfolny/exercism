//
// This is only a SKELETON file for the 'Rotational Cipher' exercise. It's been provided as a
// convenience to get you started writing code faster.
//

export const rotate = (text, rot) => {
  rot %= 26
  if (rot === 0) {
    return text
  }

  let cipher = ''
  for (const char of text.split('')) {
    let ordinance = char.charCodeAt()
    let div = null
    if (65 <= ordinance && ordinance <= 90) {
      div = 65
    }

    if (97 <= ordinance && ordinance <= 122) {
      div = 97
    }

    if (div === null) {
      cipher += char
      continue
    }
    
    ordinance -= div
    ordinance = (ordinance + rot) % 26
    ordinance += div
    cipher += String.fromCharCode(ordinance)
  }

  return cipher
}
