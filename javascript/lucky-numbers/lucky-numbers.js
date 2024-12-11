// @ts-check

/**
 * Calculates the sum of the two input arrays.
 *
 * @param {number[]} array1
 * @param {number[]} array2
 * @returns {number} sum of the two arrays
 */
export function twoSum(array1, array2) {
  array1 = array1.reverse()
  array2 = array2.reverse()
  let num1 = 0;
  let num2 = 0;

  for (const i in array1) {
    num1 += 10 ** i * array1[i]
  }
  
  for (const i in array2) {
    num2 += 10 ** i * array2[i]
  }


  return num1 + num2
}

/**
 * Checks whether a number is a palindrome.
 *
 * @param {number} value
 * @returns {boolean} whether the number is a palindrome or not
 */
export function luckyNumber(value) {
  value = value.toString()

  if (value.length % 2 == 0) {
    return value.slice(0, value.length / 2) === value.slice(value.length / 2, value.length).split("").reverse().join("")
  }

  return value.slice(0, (value.length-1) / 2) === value.slice((value.length+1) / 2, value.length).split("").reverse().join("")
}

/**
 * Determines the error message that should be shown to the user
 * for the given input value.
 *
 * @param {string|null|undefined} input
 * @returns {string} error message
 */
export function errorMessage(input) {
  console.log(input)
  if (input === "" || input === null || input === undefined) {
    return "Required field"
  }
  
  if (isNaN(input) || parseInt(input) === 0) {
    return "Must be a number besides 0"
  }

  return ""
}
