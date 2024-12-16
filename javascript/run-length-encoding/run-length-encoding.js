export const encode = (string) => {
  if (string.length < 2)
    return string

  let encoded = ""
  let prev_char = string[0]
  let count = 1
  
  for (const char of string.slice(1)) {
    if (char != prev_char) {
      encoded += count > 1 ? `${count}${prev_char}` : prev_char
      prev_char = char
      count = 0
    }

    count++
  }

  // One last time to get the last character
  encoded += count > 1 ? `${count}${prev_char}` : prev_char
  return encoded
};

export const decode = (string) => {
  if (string.length < 2) 
    return string

  let decoded = ""

  for (const part of string.match(/\d*[a-zA-Z ]/g)) {
    const count = part.match(/\d+/) == null ? 1 : parseInt(part.match(/\d+/)[0])
    const char = part.match(/[a-zA-Z ]/)[0]

    for (let i = 0; i < count; i++) {
      decoded += char
    }
  }

  return decoded
}
