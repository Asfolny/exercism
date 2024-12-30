class LargestSeriesProduct {
    static largestProduct(digits, span) {
        if (span == 0) {
            return 1
        }

        if (span < 0) {
            throw new IllegalArgumentException("span must not be negative")
        }

        if (digits.length() < span) {
            throw new IllegalArgumentException("span must be smaller than string length")
        }

        if (!digits.isNumber()) {
            throw new IllegalArgumentException("digits input must only contain digits")
        }

        def max = 0
        def peak = digits.length() - span

        for (i in 0 .. peak) {
            def num = 1

            for (p in 0..<span) {
                num *= Integer.parseInt(digits[i + p])
            }

            if (num > max) {
                max = num
            }
        } 
        
        return max
    }
}
