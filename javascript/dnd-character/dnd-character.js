//
// This is only a SKELETON file for the 'D&D Character' exercise. It's been provided as a
// convenience to get you started writing code faster.
//

export const abilityModifier = (con) => {
  if (con < 3) {
    throw new Error('Ability scores must be at least 3')
  }

  if (con > 18) {
    throw new Error('Ability scores can be at most 18')
  }
  
  return Math.floor((con - 10) / 2)
}

export const getRandomNumber = (min, max) => {
  return Math.floor(Math.random() * (max - min + 1)) + min
}

export class Character {
  static rollAbility() {
    const rolls = [
      getRandomNumber(1, 6),
      getRandomNumber(1, 6),
      getRandomNumber(1, 6),
      getRandomNumber(1, 6)
    ]
    rolls.sort()
    
    return rolls.pop() + rolls.pop() + rolls.pop()
  }

  constructor() {
    this.stats = {
      "str": Character.rollAbility(),
      "dex": Character.rollAbility(),
      "con": Character.rollAbility(),
      "int": Character.rollAbility(),
      "wis": Character.rollAbility(),
      "cha": Character.rollAbility()
    }
  }

  get strength() {
    return this.stats.str
  }

  get dexterity() {
    return this.stats.dex
  }

  get constitution() {
    return this.stats.con
  }

  get intelligence() {
    return this.stats.int
  }

  get wisdom() {
    return this.stats.wis
  }

  get charisma() {
    return this.stats.cha
  }

  get hitpoints() {
    return 10 + abilityModifier(this.constitution)
  }
}
