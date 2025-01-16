using System;

public static class CentralBank
{
    public static string DisplayDenomination(long @base, long multiplier)
    {
        try {
            return $"{checked(@base * multiplier)}";
        } catch (OverflowException _) {
            return "*** Too Big ***";
        }
    }

    public static string DisplayGDP(float @base, float multiplier)
    {
        var res = @base * multiplier;
        return Single.PositiveInfinity == res ? "*** Too Big ***" : $"{res}";
    }

    public static string DisplayChiefEconomistSalary(decimal salaryBase, decimal multiplier)
    {
        try {
            return $"{salaryBase * multiplier}";
        } catch (OverflowException _) {
            return "*** Much Too Big ***";
        }
    }
}
