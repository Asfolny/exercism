(defpackage :yacht
  (:use :cl)
  (:export :score))
(in-package :yacht)

(defun occurrences (elt lst)
  (count elt lst :test #'eq))

(defun score (scores category)
  "Returns the score of the dice for the given category."
  (case category
    (:ones (apply '+ (delete-if-not (lambda (s) (= s 1)) scores)))
    (:twos (apply '+ (delete-if-not (lambda (s) (= s 2)) scores)))
    (:threes (apply '+ (delete-if-not (lambda (s) (= s 3)) scores)))
    (:fours (apply '+ (delete-if-not (lambda (s) (= s 4)) scores)))
    (:fives (apply '+ (delete-if-not (lambda (s) (= s 5)) scores)))
    (:sixes (apply '+ (delete-if-not (lambda (s) (= s 6)) scores)))
    (:full-house (cond ((equal (sort scores #'<) (list 1 1 2 2 2)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 1 1 3 3 3)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 1 1 4 4 4)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 1 1 5 5 5)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 1 1 6 6 6)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 1 1 1 2 2)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 2 2 3 3 3)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 2 2 4 4 4)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 2 2 5 5 5)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 2 2 6 6 6)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 1 1 1 3 3)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 2 2 2 3 3)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 3 3 4 4 4)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 3 3 5 5 5)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 3 3 6 6 6)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 1 1 1 4 4)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 2 2 2 4 4)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 3 3 3 4 4)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 4 4 5 5 5)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 4 4 6 6 6)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 1 1 1 5 5)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 2 2 2 5 5)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 3 3 3 5 5)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 4 4 4 5 5)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 5 5 6 6 6)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 1 1 1 6 6)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 2 2 2 6 6)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 3 3 3 6 6)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 4 4 4 6 6)) (apply '+ scores))
                   ((equal (sort scores #'<) (list 5 5 5 6 6)) (apply '+ scores))
                   (t 0)))
    (:four-of-a-kind (cond ((>= (occurrences 1 scores) 4) 4)
                       ((>= (occurrences 2 scores) 4) 8)
                       ((>= (occurrences 3 scores) 4) 12)
                       ((>= (occurrences 4 scores) 4) 16)
                       ((>= (occurrences 5 scores) 4) 20)
                       ((>= (occurrences 6 scores) 4) 24)
                       (t 0)))
    (:little-straight (if (equal (sort scores #'<) (list 1 2 3 4 5))
                       30
                       0))
    (:big-straight (if (equal (sort scores #'<) (list 2 3 4 5 6))
                       30
                       0))
    (:choice (apply '+ scores))
    (:yacht (cond ((equal scores (list 1 1 1 1 1)) 50)
              ((equal scores (list 2 2 2 2 2)) 50)
              ((equal scores (list 3 3 3 3 3)) 50)
              ((equal scores (list 4 4 4 4 4)) 50)
              ((equal scores (list 5 5 5 5 5)) 50)
              ((equal scores (list 6 6 6 6 6)) 50)
              (t 0))))
  )
