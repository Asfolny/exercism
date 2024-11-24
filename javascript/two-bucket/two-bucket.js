//
// This is only a SKELETON file for the 'Two Bucket' exercise. It's been provided as a
// convenience to get you started writing code faster.
//
class Bucket {
  constructor(n, v, i, g, i2) {
    this.name = n
    this.volume = v
    this.holds = 0
    this.index = i
    this.pairIndex = i2
    this.actions = 0
    this.goal = g
  }
  isFull() {
    return this.volume == this.holds
  }
  isEmpty() {
    return this.holds == 0
  }
  goalCheck() {
    if (this.holds == this.goal) {
      throw this
    }
  }
  fill() {
    if (this.isFull()) {
      return
    }
    this.holds = this.volume
    ++this.actions
    this.goalCheck()
  }
  pourOut() {
    if (this.isEmpty()) {
      return
    }
    this.holds = 0
    ++this.actions
    this.goalCheck()
  }
  pourInto(another) {
    if (this == another) {
      throw new Error("Cant't pour into itself!")
    }
    const space = another.volume - another.holds
    if (space >= this.holds) {
      another.holds += this.holds
      this.holds = 0
    } else {
      this.holds -= space
      another.holds = another.volume
    }
    ++this.actions
    this.goalCheck()
    another.goalCheck()
  }
}

export class TwoBucket {
  constructor(buckOne, buckTwo, goal, starterBuck) {
    let gcd = this.gcd(buckOne, buckTwo)
    if (parseInt(goal % gcd) || (goal > buckOne && goal > buckTwo)) {
      throw new Error()
    }
    this.bucks = []
    this.bucks.push(new Bucket('one', buckOne, 0, goal, 1))
    this.bucks.push(new Bucket('two', buckTwo, 1, goal, 0))
    this.goal = goal
    this.starter = (starterBuck == 'one')? 0 : 1
    this.second = this.starter? 0 : 1
    this.steps = 0
  }

  gcd(a, b) {
    if (!b) {
      return a
    }
    return this.gcd(b, parseInt(a % b))
  }

  solve() {
    const first = this.bucks[this.starter]
    const second = this.bucks[this.second]

    try {
      while (true) {
        if (first.isEmpty()) {
          first.fill()
        }
        if (second.volume == this.goal) {
          second.fill()
        }
        console.log(first.holds, second.holds)
        first.pourInto(second) 
        console.log(first.holds, second.holds)
        if (second.isFull()) {
          second.pourOut()
        }
      }
    } catch (goal) {
      let o = {}
      o.moves = first.actions + second.actions
      o.goalBucket = goal.name
      o.otherBucket = this.bucks[goal.pairIndex].holds
      return o
    }
  }
}