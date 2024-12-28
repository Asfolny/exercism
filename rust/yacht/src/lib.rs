#[derive(Debug)]
pub enum Category {
    Ones,
    Twos,
    Threes,
    Fours,
    Fives,
    Sixes,
    FullHouse,
    FourOfAKind,
    LittleStraight,
    BigStraight,
    Choice,
    Yacht,
}

type Dice = [u8; 5];

pub fn score(dice: Dice, category: Category) -> u8 {
    let dice_iter = dice.into_iter();
    match category {
        Category::Ones => dice_iter.filter(|&x| x == 1).reduce(|acc, e| acc + e).unwrap_or(0),
        Category::Twos => dice_iter.filter(|&x| x == 2).reduce(|acc, e| acc + e).unwrap_or(0),
        Category::Threes => dice_iter.filter(|&x| x == 3).reduce(|acc, e| acc + e).unwrap_or(0),
        Category::Fours => dice_iter.filter(|&x| x == 4).reduce(|acc, e| acc + e).unwrap_or(0),
        Category::Fives => dice_iter.filter(|&x| x == 5).reduce(|acc, e| acc + e).unwrap_or(0),
        Category::Sixes => dice_iter.filter(|&x| x == 6).reduce(|acc, e| acc + e).unwrap_or(0),
        Category::FullHouse => {
            let mut one = 0;
            let mut one_count = 0;
            let mut two = 0;
            let mut two_count = 0;
            
            for item in dice_iter {
                if one == 0 {
                    one = item;
                    one_count += 1;
                    continue;
                }

                if two == 0 && item != one {
                    two = item;
                    two_count += 1;
                    continue;
                }

                if item == one {
                    one_count += 1;
                }

                if item == two {
                    two_count += 1;
                }
            }

            if (one_count == 3 && two_count == 2) || (one_count == 2 && two_count == 3) {
                return one * one_count + two * two_count;
            }

            0
        },
        Category::FourOfAKind => {
            let mut one = 0;
            let mut one_count = 0;
            let mut two = 0;
            let mut two_count = 0;
            
            for item in dice_iter {
                if one == 0 {
                    one = item;
                    one_count += 1;
                    continue;
                }

                if two == 0 && item != one {
                    two = item;
                    two_count += 1;
                    continue;
                }

                if item == one {
                    one_count += 1;
                }

                if item == two {
                    two_count += 1;
                }
            }

            if one_count >= 4 || two_count >= 4 {
                if one_count >= 4 {
                    return one * 4;
                }
    
                return two * 4;
            }
            
            0
        },
        Category::LittleStraight => {
            let mut dice = dice;
            dice.sort();
            let straight = [1, 2, 3, 4, 5];
            for i in 0..5 {
                if dice[i] != straight[i] {
                    return 0;
                }
            }

            30
        },
        Category::BigStraight => {
            let mut dice = dice;
            dice.sort();
            let straight = [2, 3, 4, 5, 6];
            for i in 0..5 {
                if dice[i] != straight[i] {
                    return 0;
                }
            }

            30
        },
        Category::Choice => dice_iter.reduce(|acc, e| acc + e).unwrap_or(0),
        Category::Yacht => {
            let mut cur = 0;
            for item in dice_iter {
                if cur == 0 {
                    cur = item;
                    continue;
                }

                if item != cur {
                    return 0;
                }
            }

            50
        },
    }
}
