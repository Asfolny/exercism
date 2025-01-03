using System;
using System.Text;
using System.Text.RegularExpressions;

public static class Identifier
{
    public static string Clean(string identifier)
    {
        var cleaned = new StringBuilder();
        var kebab = false;

        foreach (char c in identifier)
        {
            if (c == '-') {
                kebab = true;
                 // It will get filtered out by not being a letter later anyway
                continue;
            }

            if (kebab) {
                kebab = false;
                if (Char.IsLetter(c)) {
                    cleaned.Append(Char.ToUpper(c));
                    continue;
                }
            }
            
            if (Char.IsWhiteSpace(c)) {
                cleaned.Append('_');
                continue;
            }

            if (Char.IsControl(c)) {
                cleaned.Append("CTRL");
                continue;
            }

            if (!Char.IsLetter(c) || Regex.IsMatch(c.ToString(), @"[α-ω]")) {
                continue;
            }

            cleaned.Append(c);
        }

        return cleaned.ToString();
    }
}
