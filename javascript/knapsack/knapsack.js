export const knapsack = (maxWeight, items) => {
  const combinations = [{"weight": 0, "value": 0}]

  for (const item of items) {
    const sub_runs = combinations.length

    combinatric: for (let i = 0; i < sub_runs; i++) {
      const combo = combinations[i]
      if (item.weight + combo.weight > maxWeight) {
        continue
      }

      let new_item = {
        "weight": combo.weight + item.weight,
        "value": combo.value + item.value
      }

      for (const dup of combinations) {
        if (dup.weight === new_item.weight && dup.value === new_item.value) {
          continue combinatric
        }
      }

      combinations.push(new_item)
    }
  }

  let max = 0;
  for (const combo of combinations) {
    if (combo.value > max) {
      max = combo.value
    }
  }

  return max
}
