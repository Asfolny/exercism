export const largestProduct = (digits, span) => {
  if (span < 1)
    throw new Error("Span must be greater than zero")
  if (digits.length < span)
    throw new Error("Span must be smaller than string length")
  if (/^\d+$/.test(digits) === false)
    throw new Error("Digits input must only contain digits")

  let max = 0
  for (let i = 0; i <= digits.length - span; i++) {
    let num = digits[i]

    for (let j = 1; j < span; j++)
      num *= digits[i+j]

    max = num > max ? num : max
  }

  return max
}
