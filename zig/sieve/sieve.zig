const std = @import("std");

pub fn primes(buffer: []u32, limit: u32) []u32 {
    var marked = std.ArrayList(u32).init(std.testing.allocator);
    defer marked.deinit();

    var i: u32 = 2;
    var primes_found: u32 = 0;
    while (i <= limit) : (i += 1) {
        if (std.mem.containsAtLeast(u32, marked.items, 1, &[_]u32{i})) {
            continue;
        }

        buffer[primes_found] = i;
        primes_found += 1;

        var j: u32 = i * 2;
        while (j <= limit) : (j += i) {
            marked.append(j) catch |err| {
                std.debug.print("ERR {any}", .{err});
            };
        }
    }
    
    return buffer[0..primes_found];
}
