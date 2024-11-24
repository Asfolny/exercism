//
// This is only a SKELETON file for the 'All Your Base' exercise. It's been provided as a
// convenience to get you started writing code faster.
//

export const convert = (digits, in_base, out_base) => {
  if (in_base < 2) {
    throw new Error("Wrong input base");
  }

  if (out_base < 2) {
    throw new Error("Wrong output base");
  }

  if (digits.length < 1 || (digits.length > 1 && digits[0] === 0)) {
    throw new Error("Input has wrong format");
  }

  for (const digit of digits) {
    if (digit >= in_base || digit < 0) {
      throw new Error("Input has wrong format");
    }
  }

  let base = 0;
  digits.reverse().forEach(function(v, i) {
    base += v * in_base ** i;
  });

  if (base == 0) {
    return [0];
  }

  const result = [];
  let power = 0;
  while (true) {
    if (out_base ** (power + 1) > base) {
      break;
    }
    power += 1;
  }

  for (let p = power; p >= 0; p--) {
    let high = out_base ** p;
    let i = 0;

    while (true) {
      if (high * (i + 1) > base) {
        break;
      }
      i += 1;
    }

    result.push(i);
    base -= high * i;
  }

  return result;
};