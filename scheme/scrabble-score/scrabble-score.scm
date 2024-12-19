(import (rnrs))

(define (score word)
  (fold-right word->score 0
   (map char-downcase (string->list word))))

(define word->score 
  (lambda (char acc)
    (+ acc
        (case char
          ((#\a #\e #\i #\o #\u #\l #\n #\r #\s #\t) 1)
          ((#\d #\g) 2)
          ((#\b #\c #\m #\p) 3)
          ((#\f #\h #\v #\w #\y) 4)
          ((#\k) 5)
          ((#\j #\x) 8)
          ((#\q #\z) 10)
          (else 0))
    )))