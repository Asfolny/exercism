#if !defined(SECRET_HANDSHAKE_H)
#define SECRET_HANDSHAKE_H
#include <vector>
#include <string>

using std::string;
using std::vector;

namespace secret_handshake {
    vector<string> commands(int code);
}  // namespace secret_handshake

#endif // SECRET_HANDSHAKE_H
