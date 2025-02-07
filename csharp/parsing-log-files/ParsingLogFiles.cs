using System;
using System.Text.RegularExpressions;

public class LogParser
{
    public bool IsValidLine(string text) => Regex.IsMatch(text, @"^\[(TRC|DBG|INF|WRN|ERR|FTL)\]");

    public string[] SplitLogLine(string text) => Regex.Split(text, @"<[=^\-\*]*>");

    public int CountQuotedPasswords(string lines) => Regex.Count(lines, @""".*password.*""", RegexOptions.IgnoreCase | RegexOptions.Multiline);

    public string RemoveEndOfLineText(string line) => Regex.Replace(line, @"end-of-line\d*", "");

    public string[] ListLinesWithPasswords(string[] lines)
    {
        
        for(int i = 0; i < lines.Length; i++)
        {
            var line = lines[i];
            var match = Regex.Match(line, @"(password[^\s]*)", RegexOptions.IgnoreCase | RegexOptions.RightToLeft);
            lines[i] = Regex.IsMatch(match.Groups[0].Value, @"password$", RegexOptions.IgnoreCase) ?
                "--------: " + line : $"{match.Groups[0].Value}: " + line;
        }

        return lines;
    }
}
