using System;
using System.Collections.Generic;

public static class Languages
{
    public static List<string> NewList() => new List<string>();

    public static List<string> GetExistingLanguages()
    {
        var result = new List<string>();
        result.Add("C#");
        result.Add("Clojure");
        result.Add("Elm");
        return result;        
    }

    public static List<string> AddLanguage(List<string> languages, string language)
    {
        languages.Add(language);
        return languages;
    }

    public static int CountLanguages(List<string> languages) => languages.Count;


    public static bool HasLanguage(List<string> languages, string language) =>
        languages.Contains(language);

    public static List<string> ReverseList(List<string> languages)
    {
        languages.Reverse();
        return languages;
    }

    public static bool IsExciting(List<string> languages) =>
        languages.IndexOf("C#") == 0 ||
        (languages.IndexOf("C#") == 1 &&
         (languages.Count == 2 || languages.Count == 3));

    public static List<string> RemoveLanguage(List<string> languages, string language)
    {
        languages.Remove(language);
        return languages;
    }

    public static bool IsUnique(List<string> languages)
    {
        var seen = new List<string>();

        foreach(string language in languages) {
            if (seen.Contains(language)) {
                return false;
            }
            seen.Add(language);
        }

        return true;
    }
}
