pub fn is_armstrong_number(num: u32) -> bool {
    let mut length = 0;
    let mut num_vec: Vec<u32> = Vec::new();

    for v in num.to_string().chars() {
        if v.is_digit(10) {
            num_vec.push(v.to_digit(10).expect("Has to be a number!"));
            length += 1;
        }
    }

    let mut acc: u32 = 0;

    for v in num_vec.into_iter() {
        let x = v.pow(length);
        acc = acc.saturating_add(x);
    }

    return num == acc;
}
