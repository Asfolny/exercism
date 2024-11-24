# Score categories.
# Change the values as you see fit.
YACHT = 1
ONES = 2
TWOS = 3
THREES = 4
FOURS = 5
FIVES = 6
SIXES = 7
FULL_HOUSE = 8
FOUR_OF_A_KIND = 9
LITTLE_STRAIGHT = 10
BIG_STRAIGHT = 11
CHOICE = 12


def score(dice, category):
    match category:
        case 1:
            return 50 if dice in [[1] * 5, [2] * 5, [3] * 5, [4] * 5, [5] * 5, [6] * 5] else 0
    
        case 2:
            r = 0
            for n in dice:
                if n == 1:
                    r += 1
            return r
    
        case 3:
            r = 0
            for n in dice:
                if n == 2:
                    r += 2
            return r
    
        case 4:
            r = 0
            for n in dice:
                if n == 3:
                    r += 3
            return r
    
        case 5:
            r = 0
            for n in dice:
                if n == 4:
                    r += 4
            return r
    
        case 6:
            r = 0
            for n in dice:
                if n == 5:
                    r += 5
            return r
    
        case 7:
            r = 0
            for n in dice:
                if n == 6:
                    r += 6
            return r
    
        case 8:
            n1 = None
            n2 = None
            n1_count = 1
            n2_count = 1
    
            for n in dice:
                if n1 is None:
                    n1 = n
                    continue
                if n is n1:
                    n1_count += 1
                    continue

                if n2 is None:
                    n2 = n
                    continue
                if n is n2:
                    n2_count += 1
                    continue

                if n is not n1 and n is not n2:
                    return 0

            return sum(dice) if n1_count == 3 or n2_count == 3 else 0
    
        case 9:
            n1 = None
            n2 = None
            n1_count = 1
            n2_count = 1
    
            for n in dice:
                if n1 is None:
                    n1 = n
                    continue
                if n is n1:
                    n1_count += 1
                    continue

                if n2 is None:
                    n2 = n
                    continue
                if n is n2:
                    n2_count += 1
                    continue

                if n is not n1 and n is not n2:
                    return 0

            if n1_count >= 4:
                return n1 * 4
            if n1_count >= 4:
                return n2 * 4

            return 0
    
        case 10:
            return 30 if sorted(dice) == [1, 2, 3, 4, 5] else 0
    
        case 11:
            return 30 if sorted(dice) == [2, 3, 4, 5, 6] else 0
    
        case 12:
            return sum(dice)