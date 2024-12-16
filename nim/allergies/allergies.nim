import std/bitops

type
  Allergen* = enum
    Eggs, Peanuts, Shellfish, Strawberries, Tomatoes, Chocolate, Pollen, Cats

proc isAllergicTo*(score: int, allergen: Allergen): bool =
  case allergen:
  of Eggs:
    return score.testBit(0)
  of Peanuts:
    return score.testBit(1)
  of Shellfish:
    return score.testBit(2)
  of Strawberries:
    return score.testBit(3)
  of Tomatoes:
    return score.testBit(4)
  of Chocolate:
    return score.testBit(5)
  of Pollen:
    return score.testBit(6)
  of Cats:
    return score.testBit(7)

proc allergies*(score: int): set[Allergen] =
  var ret: set[Allergen] = {}
  for a in Allergen:
    if isAllergicTo(score, a):
      ret = ret + {a}
  return ret
