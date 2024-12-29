module main
import math

enum BucketId {
  one
  two
}

struct Solution {
  moves        int
  goal_bucket  BucketId
  other_bucket int
}

pub fn measure(capacity_one int, capacity_two int, goal int, start_bucket BucketId) !Solution {
  first_move := if start_bucket == BucketId.one { [capacity_one,0,1] } else { [0,capacity_two,1] }
  forbidden_move := if start_bucket == BucketId.one { [0,capacity_two] } else { [capacity_one,0] }

  mut queue := [first_move]
  mut history := [forbidden_move]

  for queue.len > 0 {
    state := queue.pop()
    history << [state[0],state[1]]

    if goal == state[0] { return Solution{moves: state[2], goal_bucket: BucketId.one, other_bucket: state[1]} }
    if goal == state[1] { return Solution{moves: state[2], goal_bucket: BucketId.two, other_bucket: state[0]} }

    pour_one := math.min(state[0], capacity_two - state[1])
    pour_two := math.min(state[1], capacity_one - state[0])
    actions := [[0,state[1],state[2]+1], [capacity_one,state[1],state[2]+1],
                [state[0],0,state[2]+1], [state[0],capacity_two,state[2]+1],
                [state[0]-pour_one,state[1]+pour_one,state[2]+1], [state[0]+pour_two,state[1]-pour_two,state[2]+1]]

    valid_actions := actions.filter([it[0],it[1]] !in history)
    queue.prepend(valid_actions)
  }

  return error("impossible")
}