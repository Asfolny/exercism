#lang racket

(provide balanced?)

(define (bracket? char)
  (or
    (char=? char #\{)
    (char=? char #\})
    (char=? char #\[)
    (char=? char #\])
    (char=? char #\()
    (char=? char #\))))

(define (matches? left right)
  (or 
    (and (char=? left #\{) (char=? right #\}))
    (and (char=? left #\[) (char=? right #\]))
    (and (char=? left #\() (char=? right #\)))))

(define (balance c brackets)
  (cond
    [(not (bracket? c)) brackets]
    [(empty? brackets) (list c)]
    [(matches? (last brackets) c) (drop-right brackets 1)]
    [else (append brackets (list c))]))

(define (balanced? str)
  (empty? (foldl balance '() (string->list str))))