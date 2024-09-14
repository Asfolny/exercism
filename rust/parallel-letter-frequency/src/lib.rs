use std::collections::HashMap;

pub fn frequency(input: &[&str], worker_count: usize) -> HashMap<char, usize> {
    let mut r = HashMap::new();
    for text in input {
        for c in text.to_lowercase().chars() {
            if c.is_ascii_punctuation() || c.is_numeric() {
                continue;
            }

            r.entry(c).or_insert(0);
            r.entry(c).and_modify(|p| *p += 1);
        }
    }

    r
}
