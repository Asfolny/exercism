#include "reverse_string.h"
#include <algorithm>

namespace reverse_string {
    std::string reverse_string(std::string input) 
    {
        std::string output(input);
        std::reverse(output.begin(), output.end());
        return output;
    }
} 
