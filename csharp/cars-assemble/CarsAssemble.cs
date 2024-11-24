using System;

static class AssemblyLine
{
    public static double SuccessRate(int speed) =>
        speed switch
        {
                0 => 0,
                > 0 and <= 4 => 1,
                > 4 and <= 8 => .90,
                > 8 and < 10 => .80,
                _ => .77
        };
    
    public static double ProductionRatePerHour(int speed) =>
        221 * speed * SuccessRate(speed);

    public static int WorkingItemsPerMinute(int speed) =>
        (int)(ProductionRatePerHour(speed) / 60);

}
