export function valid(digitString: string): boolean {
  let digits = digitString.replace(new RegExp(/ /, 'g'), '').split('').map(Number)
  if (digits.length < 2 || digits.includes(NaN)) {
    return false
  }
  
  const last = digits[digits.length-1]
  digits = digits.slice(0, -1).reverse()
  
  for (let i = 0; i < digits.length; i += 2) {
    let digit = digits[i] * 2
  
    if (digit > 9) {
      digit -= 9
    }
    
    digits[i] = digit
  }

  const sum = (digits.reduce((acc, n) => acc + n, 0) + last)
  return sum % 10 === 0
}
