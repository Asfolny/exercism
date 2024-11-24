def roman(number):
    r = ""
    tmp = ""

    while number >= 1000:
        r += "M"
        number -= 1000

    while number > 100:
        tmp += "C"
        if tmp == "CCCC":
            tmp = "CD"
        if tmp == "CDC":
            tmp = "D"
        if tmp == "DCCCC":
            tmp = "CM"
        number -= 100
    r += tmp
    tmp = ""

    while number >= 10:
        tmp += "X"
        if tmp == "XXXX":
            tmp = "XL"
        if tmp == "XLX":
            tmp = "L"
        if tmp == "LXXXX":
            tmp = "XC"
        number -= 10

    r += tmp
    tmp = ""

    while number >= 1:
        tmp += "I"
        if tmp == "IIII":
            tmp = "IV"
        if tmp == "IVI":
            tmp = "V"
        if tmp == "VIIII":
            tmp = "IX"
        number -= 1
    
    return r + tmp
