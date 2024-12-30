object Series {
  def largestProduct(span: Int, digits: String): Option[Int] = {
    if (span == 0) {
      return Some(1);
    }
    
    if (span > digits.length || span < 0 || !digits.matches("-?\\d+")) {
      return None;
    }

    var max = 0;

    for (i <- 0 to (digits.length - span)) {
      var num = 1;

      for (p <- 0 until span) {
        num *= digits(i+p).asDigit;
      }

      if (num > max) {
        max = num;
      }
    }
    
    return Some(max);
  }
}