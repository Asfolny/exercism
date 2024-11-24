//
// This is only a SKELETON file for the 'Parallel Letter Frequency' exercise. It's been provided as a
// convenience to get you started writing code faster.
//

export const parallelLetterFrequency = async (texts) => {
  let frequencies = {};
  Promise.all((texts).map((text) =>  letterFrequency(frequencies, text)));
  return frequencies
};

const letterFrequency = (frequencies, text) => {
  return new Promise((resolve) =>{
    for (const [letter] of text.toLowerCase().match(/\p{L}/gu) || [])
      frequencies[letter] = (frequencies[letter] || 0) + 1 ;
    resolve(frequencies);
  })
}