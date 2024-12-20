class Squares {
  var squareOfSum: Int
  var sumOfSquares: Int
  var differenceOfSquares: Int
  
  // Write your code for the 'Difference Of Squares' exercise here.
  init(_ max: Int) {
    squareOfSum = 0
    for i in 1...max {
      squareOfSum += i
    }
    squareOfSum *= squareOfSum
    
    sumOfSquares = 0
    for i in 1...max {
      sumOfSquares += i * i
    }

    differenceOfSquares = squareOfSum - sumOfSquares
  }
}
