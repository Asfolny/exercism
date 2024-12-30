pub fn check(candidate: &str) -> bool {
    let mut seen = Vec::new();

    for c in candidate.to_lowercase().chars() {
        if c.is_alphabetic() && seen.contains(&c) {
            return false;
        }

        seen.push(c);
    }

    true
}
