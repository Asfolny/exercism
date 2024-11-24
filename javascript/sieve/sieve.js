//
// This is only a SKELETON file for the 'Sieve' exercise. It's been provided as a
// convenience to get you started writing code faster.
//

export const primes = (num) => {
  if (num < 2) {
    return [];
  }

  let primes = [];
  let multiples = [];

  for (let i = 2; i <= num; i++) {
    if (multiples.indexOf(i) === -1) {
      primes.push(i);

      for (let j = i*2; j <= num; j += i) {
        if (multiples.indexOf(j) === -1) {
          multiples.push(j);
        }
      }
    }
  }

  return primes;
};
