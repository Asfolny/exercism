using System;

public static class LogAnalysis 
{
    public static string SubstringAfter(this string log, string delim) => log.Split(delim)[1];
    public static string Message(this string log) => log.SubstringAfter(": ");
    public static string LogLevel(this string log) => log.SubstringBetween("[", "]");

    public static string SubstringBetween(this string log, string leftDelim, string rightDelim)
    {
        if (log.IndexOf(leftDelim) == -1 || log.IndexOf(rightDelim) == -1)
            return "";
        var start = log.IndexOf(leftDelim) + leftDelim.Length;
        return log.Substring(start, log.IndexOf(rightDelim) - start);
    }
}