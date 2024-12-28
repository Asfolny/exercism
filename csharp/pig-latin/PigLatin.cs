using System;
using System.Collections;
using System.Collections.Generic;
using System.Text.RegularExpressions;

public static class PigLatin
{
    public static string Translate(string word)
    {
        var output = new List<string>();

        foreach (string part in word.Split(' '))
        {
            if (Regex.IsMatch(part, @"^[aeiou]|^xr|^yt"))
            {
                output.Add(part + "ay");
                continue;
            }

            if (Regex.IsMatch(part, @"(.*qu)(.*)"))
            {
                var m = Regex.Match(part, @"(.*qu)(.*)");
                output.Add(m.Groups[2].Value + m.Groups[1].Value + "ay");
                continue;
            }

            if (Regex.IsMatch(part, @"([b-df-hj-np-tv-z]+)([aeiou].*)"))
            {
                var m = Regex.Match(part, @"([b-df-hj-np-tv-z]+)([aeiou].*)");
                output.Add(m.Groups[2].Value + m.Groups[1].Value + "ay");
                continue;
            }

            if (Regex.IsMatch(part, @"([b-df-hj-np-tv-z]+)(y.*)"))
            {
                var m = Regex.Match(part, @"([b-df-hj-np-tv-z]+)(y.*)");
                output.Add(m.Groups[2].Value + m.Groups[1].Value + "ay");
                continue;
            }
        }

        return String.Join(" ", output.ToArray());
    }
}
