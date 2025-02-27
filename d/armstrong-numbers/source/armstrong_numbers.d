module armstrong_numbers;

import std.algorithm: map, sum;
import std.conv: to;
import std.range: array;
import std.utf: byCodeUnit;


bool isArmstrongNumber(int num) pure
{
    auto digits = splitDigits(num);
    auto power = digits.length;
    return digits.map!(n => n ^^ power).sum == num;
}


private int[] splitDigits(int n) pure
{
    return n.to!string
            .byCodeUnit
            .map!(c => c - '0')
            .array;
}

unittest
{
    immutable int allTestsEnabled = 1;

    // Zero is an Armstrong number
    assert(isArmstrongNumber(0));

    static if (allTestsEnabled)
    {
        // Single digit numbers are Armstrong numbers
        assert(isArmstrongNumber(5));

        // There are no 2 digit Armstrong numbers
        assert(!isArmstrongNumber(10));

        // Three digit number that is an Armstrong number
        assert(isArmstrongNumber(153));

        // Three digit number that is not an Armstrong number
        assert(!isArmstrongNumber(100));

        // Four digit number that is an Armstrong number
        assert(isArmstrongNumber(9474));

        // Four digit number that is not an Armstrong number
        assert(!isArmstrongNumber(9475));

        // Seven digit number that is an Armstrong number
        assert(isArmstrongNumber(9926315));

        // Seven digit number that is not an Armstrong number
        assert(!isArmstrongNumber(9926314));
    }
}