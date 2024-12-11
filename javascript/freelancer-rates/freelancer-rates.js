// @ts-check

const DAY_WORKING_HOURS = 8
const MONTH_WORKING_DAYS = 22

/**
 * The day rate, given a rate per hour
 *
 * @param {number} ratePerHour
 * @returns {number} the rate per day
 */
export function dayRate(ratePerHour) {
  return ratePerHour * DAY_WORKING_HOURS
}

/**
 * Calculates the number of days in a budget, rounded down
 *
 * @param {number} budget: the total budget
 * @param {number} ratePerHour: the rate per hour
 * @returns {number} the number of days
 */
export function daysInBudget(budget, ratePerHour) {
  return Math.floor(budget / dayRate(ratePerHour))
}

/**
 * Calculates the discounted rate for large projects, rounded up
 *
 * @param {number} ratePerHour
 * @param {number} numDays: number of days the project spans
 * @param {number} discount: for example 20% written as 0.2
 * @returns {number} the rounded up discounted rate
 */
export function priceWithMonthlyDiscount(ratePerHour, numDays, discount) {
  const months = Math.floor(numDays / MONTH_WORKING_DAYS)
  const extraDays = numDays - (months * MONTH_WORKING_DAYS)
  let monthlyRate = dayRate(ratePerHour) * MONTH_WORKING_DAYS

  if (discount > 0) {
    monthlyRate -= monthlyRate * discount
  }

  return Math.ceil(months * monthlyRate + extraDays * dayRate(ratePerHour))
}
