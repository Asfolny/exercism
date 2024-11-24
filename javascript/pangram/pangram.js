//
// This is only a SKELETON file for the 'Pangram' exercise. It's been provided as a
// convenience to get you started writing code faster.
//

export const isPangram = (sentence) => {
  const set = new Set();
  
  for (const char of sentence.toLowerCase()) {
    // Unicode aware letter check
    if (RegExp(/^\p{L}/,'u').test(char)) {
      set.add(char);
    }
  }

  return set.size === 26;
};
