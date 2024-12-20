#include "all_your_base.h"
#include <algorithm>
#include <cmath>
#include <stdexcept>

namespace all_your_base {
    std::vector<unsigned int> convert(int from, std::vector<unsigned int> digit, int to) {
        if (from < 2) {
            throw std::invalid_argument("input base must be >= 2");
        }
    
        if (to < 2) {
            throw std::invalid_argument("output base must be >= 2");
        }

        unsigned int tenth = 0;
        bool onlyZeroes = true;
        
        std::reverse(digit.begin(), digit.end());
        
        for (unsigned int pos = 0; pos < digit.size(); pos++) {
            if (digit[pos] >= (unsigned int)from) {
                throw std::invalid_argument("all digits must satisfy 0 <= d < input base");
            }

            if (digit[pos] > 0) {
                onlyZeroes = false;
            }

            tenth += digit[pos] * (unsigned int)std::pow(from, pos);
        }

        std::vector<unsigned int> result;

        if (onlyZeroes) {
            return result;
        }

        while (tenth >= (unsigned int)to) {
            unsigned int remainder = tenth % to;
            tenth = (unsigned int)floor(tenth / to);
            result.push_back(remainder);
        }

        result.push_back(tenth % to);
        std::reverse(result.begin(), result.end());
        
        return result;
    }
}  // namespace all_your_base
