import std/random
import std/algorithm
import std/sequtils
import std/math
  
type
  Character* = object
    strength*: int
    dexterity*: int
    constitution*: int
    intelligence*: int
    wisdom*: int
    charisma*: int
    hitpoints*: int

proc ability*: int =
  var l = [rand(1..6), rand(1..6), rand(1..6), rand(1..6)]
  l.sort()
  foldl(l[1..3], a + b)
  
  

proc modifier*(n: int): int =
  int(floor((n - 10) / 2))

proc initCharacter*: Character =
  var con = ability()
  Character(
            strength: ability(),
            dexterity: ability(),
            constitution: con,
            intelligence: ability(),
            wisdom: ability(),
            charisma: ability(),
            hitpoints: modifier(con) + 10
  )
