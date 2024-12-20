(module
  ;;
  ;; Calculate the square of the sum of the first N natural numbers
  ;;
  ;; @param {i32} max - The upper bound (inclusive) of natural numbers to consider
  ;;
  ;; @returns {i32} The square of the sum of the first N natural numbers
  ;;
  (func $squareOfSum (export "squareOfSum") (param $max i32) (result i32)
    (local $square i32)
    (local $idx i32)
  
    (local.set $idx (i32.const 1))
    (local.set $square (i32.const 0))

    (block
      (loop
        (local.set $square (i32.add (local.get $square) (local.get $idx)))
        (local.set $idx (i32.add (local.get $idx) (i32.const 1)))

        (br_if 1 (i32.gt_u (local.get $idx) (local.get $max)))
        (br 0)
      )
    )

    (i32.mul (local.get $square) (local.get $square))
  )

  ;;
  ;; Calculate the sum of the squares of the first N natural numbers
  ;;
  ;; @param {i32} max - The upper bound (inclusive) of natural numbers to consider
  ;;
  ;; @returns {i32} The sum of the squares of the first N natural numbers
  ;;
  (func $sumOfSquares (export "sumOfSquares") (param $max i32) (result i32)
    (local $sum i32)
    (local $tmp i32)
    (local $idx i32)
  
    (local.set $idx (i32.const 1))
    (local.set $sum (i32.const 0))
    (local.set $tmp (i32.const 0))

    (block
      (loop
        (local.set $tmp (i32.mul (local.get $idx) (local.get $idx)))
        (local.set $sum (i32.add (local.get $sum) (local.get $tmp)))
        (local.set $idx (i32.add (local.get $idx) (i32.const 1)))

        (br_if 1 (i32.gt_u (local.get $idx) (local.get $max)))
        (br 0)
      )
    )

    (local.get $sum)
  )

  ;;
  ;; Calculate the difference between the square of the sum and the sum of the 
  ;; squares of the first N natural numbers.
  ;;
  ;; @param {i32} max - The upper bound (inclusive) of natural numbers to consider
  ;;
  ;; @returns {i32} Difference between the square of the sum and the sum of the
  ;;                squares of the first N natural numbers.
  ;;
  (func (export "difference") (param $max i32) (result i32)
    (i32.sub 
      (call $squareOfSum (local.get $max))
      (call $sumOfSquares (local.get $max))
    )
  )
)
