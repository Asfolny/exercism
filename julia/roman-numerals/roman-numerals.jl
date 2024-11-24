function to_roman(number)
    number <= 0 && return error(ErrorException("Unnatural number"))
    out = ""
    number ÷ 1000 >= 1 && (out = repeat("M", number ÷ 1000); number = number - 1000 * (number ÷ 1000))
    number ÷ 900 >= 1 && (out = out * "CM" ; number = number - 900)
    number ÷ 500 >= 1 && (out = out * "D" ; number = number - 500)
    number ÷ 400 >= 1 && (out = out * "CD" ; number = number - 400)
    number ÷ 100 >= 1 && (out = out * repeat("C", number ÷ 100); number = number - 100 * (number ÷ 100))
    number ÷ 90 >= 1 && (out = out * "XC" ; number = number - 90)
    number ÷ 50 >= 1 && (out = out * "L" ; number = number - 50)
    number ÷ 40 >= 1 && (out = out * "XL" ; number = number - 40)
    number ÷ 10 >= 1 && (out = out * repeat("X", number ÷ 10) ; number = number - 10 * (number ÷ 10))
    number ÷ 9 >= 1 && (out = out * "IX" ; number = number - 9)
    number ÷ 5 >= 1 && (out = out * "V" ; number = number - 5)
    number ÷ 4 >= 1 && (out = out * "IV" ; number = number - 4)
    out = out * repeat("I", number)
    return out
end