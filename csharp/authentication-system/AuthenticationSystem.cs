using System.Collections.Generic;
using System.Collections.ObjectModel;

public class Authenticator
{
    private class EyeColor
    {
        public const string Blue = "blue";
        public const string Green = "green";
        public const string Brown = "brown";
        public const string Hazel = "hazel";
        public const string Brey = "grey";
    }

    public Authenticator(Identity admin)
    {
        this.admin = admin;
    }

    private Identity admin;

    private IDictionary<string, Identity> developers
        = new Dictionary<string, Identity>
        {
            ["Bertrand"] = new Identity
            {
                Email = "bert@ex.ism",
                EyeColor = "blue"
            },

            ["Anders"] = new Identity
            {
                Email = "anders@ex.ism",
                EyeColor = "brown"
            }
        };

    public Identity Admin
    {
        get { return admin; }
        set { admin = value; }
    }

    public IDictionary<string, Identity> GetDevelopers()
    {
        return new ReadOnlyDictionary<string, Identity>(developers);
    }
}

public struct Identity
{
    public string Email { get; set; }

    public string EyeColor { get; set; }
}