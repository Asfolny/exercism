//
// This is only a SKELETON file for the 'Luhn' exercise. It's been provided as a
// convenience to get you started writing code faster.
//

export const valid = (number) => {
  let digits = number.replaceAll(' ', '').split('').map(Number);
  if (digits.length < 2 || digits.includes(NaN)) {
    return false;
  }
  
  const last = digits[digits.length-1];
  digits = digits.slice(0, -1).reverse();
  
  for (let i = 0; i < digits.length; i += 2) {
    let digit = digits[i] * 2;
  
    if (digit > 9) {
      digit -= 9;
    }
    
    digits[i] = digit;
  }

  const sum = (digits.reduce((acc, n) => acc + n, 0) + last);
  return sum % 10 === 0;
};
