import re

def decode(string):
    if len(string) < 2:
        return string
    decoded = ""
    
    for single in re.findall(r"\d*[a-zA-Z ]", string):
        char = re.search(r"[a-zA-Z ]", single).group()
        count = re.search(r"\d*", single).group()
        if count == "":
            count = "1"

        for i in range(int(count)):
            decoded += char
        
    return decoded

def encode(string):
    if len(string) < 2:
        return string

    encoded = ""
    count = 1
    prev_char = string[0]
    
    for char in string[1:]:
        if char != prev_char:
            encoded += f"{count}{prev_char}" if count > 1 else prev_char
            prev_char = char
            count = 0
        count += 1
    
    # One last time to get the last character
    encoded += f"{count}{prev_char}" if count > 1 else prev_char    
    return encoded
