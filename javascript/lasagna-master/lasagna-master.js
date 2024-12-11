/// <reference path="./global.d.ts" />
// @ts-check

export function cookingStatus(timer) {
  if (timer === 0) {
    return "Lasagna is done."
  }

  if (Number.isNaN(timer) || timer === undefined) {
    return "You forgot to set the timer."
  }

  return "Not done, please wait."
}

export function preparationTime(layers, time = 2) {
  return layers.length * time
}

export function quantities(layers) {
  const result = {"sauce": 0, "noodles": 0}

  for (const item of layers) {
    if (item === "sauce") {
      result[item] += .2
    }

    if (item === "noodles") {
      result[item] += 50
    }
  }

  return result
}

export function addSecretIngredient(listOne, listTwo) {
  const last = listOne[listOne.length-1]
  if (!listTwo.includes(last)) {
    listTwo.push(last)
  }
}

export function scaleRecipe(recipe, scale) {
  if (scale === undefined) {
    return recipe
  }

  const result = {}
  
  for (const item in recipe) {
    result[item] = recipe[item] * (scale / 2)
  }

  return result
}