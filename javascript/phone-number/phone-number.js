export const clean = (number) => {
  let clean_num = ""

  for (const part of number) {
    if (['(', ')', '-', '+', '.', ' '].includes(part)) {
      continue
    }

    if (part.match(/[a-z]/i)) {
      throw new Error('Letters not permitted')
    }

    if (isNaN(Number(part))) {
      throw new Error('Punctuations not permitted')
    }

    clean_num += part
  }

  if (clean_num.length < 10) {
    throw new Error('Incorrect number of digits')
  }

  if (clean_num.length > 11) {
    throw new Error('More than 11 digits')
  }

  if (clean_num.length == 11) {
    if (clean_num[0] !== '1') {
      throw new Error('11 digits must start with 1')
    }

    clean_num = clean_num.substring(1);
  }

  switch(clean_num[0]) {
    case '0':
      throw new Error('Area code cannot start with zero')
    case '1':
      throw new Error('Area code cannot start with one')
  }

  switch(clean_num[3]) {
    case '0':
      throw new Error('Exchange code cannot start with zero')
    case '1':
      throw new Error('Exchange code cannot start with one')
  }

  return clean_num
}
