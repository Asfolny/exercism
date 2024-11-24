export const eggCount = (displayValue) => {
  let eggs = 0
  let max = 0
  while (2 ** max < displayValue) {
    max++
  }

  for (let i = max; i >= 0; i--) {
    if (displayValue >= 2 ** i) {
      eggs++
      displayValue -= 2 ** i
    }
  }

  return eggs
}
