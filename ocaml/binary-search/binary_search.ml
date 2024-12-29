open Base

let find arr n =
  let rec find' left right =
    let h = left + ((right - left) / 2) in
    if left > right then Error "value not in array"
    else if n > arr.(h) then find' (h + 1) right
    else if n < arr.(h) then find' left (h - 1)
    else Ok h
  in
  find' 0 (Array.length arr - 1)