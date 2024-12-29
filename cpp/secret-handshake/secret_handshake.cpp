#include "secret_handshake.h"
#include <algorithm>

namespace secret_handshake {
    vector<string> commands(int code) {
        vector<string> res;

        if ((code & 0b00001) != 0) {
            res.push_back("wink");
        }

        if ((code & 0b00010) != 0) {
            res.push_back("double blink");
        }

        if ((code & 0b00100) != 0) {
            res.push_back("close your eyes");
        }

        if ((code & 0b01000) != 0) {
            res.push_back("jump");
        }
        
        if ((code & 0b10000) != 0) {
            std::reverse(res.begin(), res.end());
        }

        return res;
    }
}  // namespace secret_handshake
