def response(hey_bob):
    question = False
    yell = False

    hey_bob = hey_bob.strip()
    if "" == hey_bob:
        return "Fine. Be that way!"

    if "?" == hey_bob[-1]:
        question = True
    if hey_bob.isupper():
        yell = True

    

    if question and yell:
        return "Calm down, I know what I'm doing!"
    if question:
        return "Sure."
    if yell:
        return "Whoa, chill out!"

    return "Whatever."