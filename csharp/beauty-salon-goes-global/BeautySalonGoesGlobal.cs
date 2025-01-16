using System;
using System.Globalization;
using System.Runtime.InteropServices;

public enum Location
{
    NewYork,
    London,
    Paris
}

public enum AlertLevel
{
    Early,
    Standard,
    Late
}

public static class Appointment
{
    public static DateTime ShowLocalTime(DateTime dtUtc) => dtUtc.ToLocalTime();


    public static DateTime Schedule(string appointmentDateDescription, Location location)
    {
        var tzi = getTimeZoneInfoFromLocation(location);
        var dt = DateTime.Parse(appointmentDateDescription);
        return TimeZoneInfo.ConvertTimeToUtc(dt, tzi);
    }

    public static DateTime GetAlertTime(DateTime appointment, AlertLevel alertLevel) =>
        alertLevel switch {
            AlertLevel.Early => appointment - new TimeSpan(1, 0, 0, 0),
            AlertLevel.Standard => appointment - new TimeSpan(1, 45, 0),
            AlertLevel.Late => appointment - new TimeSpan(0, 30, 0),
        };


    public static TimeZoneInfo getTimeZoneInfoFromLocation(Location location) =>
        TimeZoneInfo.FindSystemTimeZoneById(location switch {
                Location.NewYork => RuntimeInformation.IsOSPlatform(OSPlatform.Windows) ?
                    "Eastern Standard Time" : "America/New_York",
                Location.London => RuntimeInformation.IsOSPlatform(OSPlatform.Windows) ?
                    "GMT Standard Time" : "Europe/London",
                Location.Paris => RuntimeInformation.IsOSPlatform(OSPlatform.Windows) ?
                    "W.Europe Standard Time" : "Europe/Paris"
        });

    public static bool HasDaylightSavingChanged(DateTime dt, Location location)
    {
        var tzi = getTimeZoneInfoFromLocation(location);
        return tzi.IsDaylightSavingTime(dt) != tzi.IsDaylightSavingTime(dt - new TimeSpan(7, 0, 0, 0));
    }

    public static DateTime NormalizeDateTime(string dtStr, Location location)
    {
        try
        {
            return DateTime.Parse(dtStr, new CultureInfo(location switch {
                Location.NewYork => "NewYork",
                Location.London => "UK",
                Location.Paris => "FR"
            }));
        }
        catch (FormatException e)
        {
            return new DateTime(1, 1, 1, 0, 0, 0);
        }
    }
}
