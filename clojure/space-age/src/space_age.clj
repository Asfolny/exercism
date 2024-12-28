(ns space-age)

(defn on-earth [seconds] ;; <- arglist goes here
  (/ seconds 31557600)
)

(defn on-mercury [seconds] ;; <- arglist goes here
  (/ (on-earth seconds) 0.2408467)
)

(defn on-venus [seconds] ;; <- arglist goes here
  (/ (on-earth seconds) 0.61519726)
)

(defn on-mars [seconds] ;; <- arglist goes here
  (/ (on-earth seconds) 1.8808158)
)

(defn on-jupiter [seconds] ;; <- arglist goes here
  (/ (on-earth seconds) 11.862615)
)

(defn on-saturn [seconds] ;; <- arglist goes here
  (/ (on-earth seconds) 29.447498)
)

(defn on-uranus [seconds] ;; <- arglist goes here
  (/ (on-earth seconds) 84.016846)
)

(defn on-neptune [seconds] ;; <- arglist goes here
  (/ (on-earth seconds) 164.79132)
)
