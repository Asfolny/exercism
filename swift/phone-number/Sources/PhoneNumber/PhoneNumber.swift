enum PhoneNumberError: Error{
  case invalidPhoneNumber
}

class PhoneNumber {
  let rawString: String
  
  init(_ input:String)
  {
    rawString = input
  }

  func clean() throws -> String
  {
    var digits = rawString.filter {$0.isNumber}
    if digits.count == 11 && digits.starts(with: "1")
    {
      digits.remove(at: digits.startIndex)
    }
    let areaDigit = digits[digits.index(digits.startIndex, offsetBy: 0)].wholeNumberValue ?? 0
    let exchangeCodeDigit = digits[digits.index(digits.startIndex, offsetBy: 3)].wholeNumberValue ?? 0
    guard (areaDigit >= 2) && (exchangeCodeDigit >= 2) && (digits.count == 10) else {
      throw PhoneNumberError.invalidPhoneNumber
    }
    return digits
  }
}