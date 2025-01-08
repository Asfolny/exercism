using System;
using System.Text;

static class Badge
{
    public static string Print(int? id, string name, string? department)
    {
        var sb = new StringBuilder();
        if (id != null) {
            sb.Append($"[{id}] - ");
        }

        sb.Append(name);

        department ??= "Owner";
        sb.Append($" - {department.ToUpper()}");
        return sb.ToString();
    }
}
