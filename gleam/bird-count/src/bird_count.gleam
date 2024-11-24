pub fn today(days: List(Int)) -> Int {
  case days {
    [] -> 0
    [today, ..] -> today
  }
}

pub fn increment_day_count(days: List(Int)) -> List(Int) {
  case days {
    [] -> [1]
    [today, ..rest] -> [today+1, ..rest]
  }
}

pub fn has_day_without_birds(days: List(Int)) -> Bool {
  case days {
    [] -> False
    [day, ..rest] -> day == 0 || has_day_without_birds(rest)
  }
}

pub fn total(days: List(Int)) -> Int {
  case days {
    [] -> 0
    [day, ..rest] -> day + total(rest)
  }
}

pub fn busy_days(days: List(Int)) -> Int {
  case days {
    [] -> 0
    [day, ..rest] -> case day >= 5 {
        True -> 1
        False -> 0
    } + busy_days(rest)
  }
}
