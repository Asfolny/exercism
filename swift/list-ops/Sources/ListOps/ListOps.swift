//Solution goes in Sources

func append(_ a: [Int], _ b: [Int]) -> [Int] {
  var r = a

  for e in b {
    r.append(e)
  }

  return r
}

func concat(_ lists: [Int]...) -> [Int] {
  var r = [Int]()

  for list in lists {
    r = append(r, list)
  }

  return r
}

func filter(_ list: [Int], _ predicate: (Int) -> Bool) -> [Int] {
  var r = [Int]()

  for e in list {
    if predicate(e) {
      r.append(e)
    }
  }

  return r
}

func length<T>(_ list: [T]) -> Int {
  var r = 0

  for _ in list {
    r += 1
  }

  return r
}

func map(_ list: [Int], _ fun: (Int) -> Int) -> [Int] {
  var r = [Int]()

  for e in list {
    r.append(fun(e))
  }

  return r
}

func reverse<T>(_ list: [T]) -> [T] {
  var r = [T]()

  for i in stride(from: length(list)-1, through: 0, by: -1) {
    r.append(list[i])
  }

  return r
}

func foldLeft<T>(_ list: [T], accumulated: T, combine: (T, T) -> T) -> T {
  var acc = accumulated

  for e in list {
    acc = combine(acc, e)
  }

  return acc
}

func foldRight<T>(_ list: [T], accumulated: T, combine: (T, T) -> T) -> T {
  var acc = accumulated

  for e in reverse(list) {
    acc = combine(e, acc)
  }

  return acc
}