module TwoBucket
  enum Bucket
    One
    Two
  end

  struct Result
    property moves, other_bucket, goal_bucket

    def initialize(@moves : UInt32, @other_bucket : UInt32, @goal_bucket : Bucket)
    end
  end

  def self.measure(bucket_one : UInt32, bucket_two : UInt32, goal : UInt32, start_bucket : Bucket)
    start, forbidden = {bucket_one, 0_u32}, {0_u32, bucket_two}
    start, forbidden = forbidden, start if start_bucket == Bucket::Two

    states = {start => 1_u32}
    queue = Deque{start}

    while state = queue.shift?
      cnt = states[state]
      return Result.new(cnt, state[1], Bucket::One) if state[0] == goal
      return Result.new(cnt, state[0], Bucket::Two) if state[1] == goal

      new_cnt = cnt + 1

      d12 = {state[0], bucket_two - state[1]}.min
      d21 = {state[1], bucket_one - state[0]}.min

      {
        {0_u32, state[1]}, {bucket_one, state[1]},
        {state[0], 0_u32}, {state[0], bucket_two},
        {state[0] + d21, state[1] - d21},
        {state[0] - d12, state[1] + d12},
      }.each do |new_state|
        if new_state != forbidden && !states.has_key?(new_state)
          states[new_state] = new_cnt
          queue << new_state
        end
      end
    end

    raise ArgumentError.new("Can't reach goal")
  end
end