class PascalsTriangle
  constructor: () ->

  rows: (n) ->
    if n == 0
        return []
    if n == 1
        return [[1]]
    if n == 2
        return [[1],[1, 1]]
    all = this.rows(n - 1)
    prev = all[all.length - 1]
    row = [1]
    for i in [0..prev.length-2]
        row.push prev[i]+prev[i+1]
    row.push 1
    all.push row
    return all

global.PascalsTriangle = PascalsTriangle
module.exports = PascalsTriangle