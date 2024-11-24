pub fn collatz(n: u64) -> Option<u64> {
    if n == 0 {
        return None;
    }

    if n == 1 {
        return Some(0);
    }

    let mut r = 1;

    if n % 2 == 0 {
        r += match collatz(n/2) {
            Some(x) => x,
            None => 0,
        }
    } else {
        r += match collatz(3 * n + 1) {
            Some(x) => x,
            None => 0,
        }
    }

    Some(r)
}
