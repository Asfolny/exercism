# this is a stub function that takes a natural_number
# and should return the difference-of-squares as described
# in the README.md
difference_of_squares <- function(natural_number) {
  square = 0
  for (i in 1:natural_number) {
    square <- square + i
  }
  square <- square ^ 2

  sum = 0
  for (i in 1:natural_number) {
    sum <- sum + i ^ 2
  }

  square - sum
}
