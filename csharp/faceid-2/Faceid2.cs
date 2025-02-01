using System;
using System.Collections.Generic;

public class FacialFeatures
{
    public string EyeColor { get; }
    public decimal PhiltrumWidth { get; }

    public FacialFeatures(string eyeColor, decimal philtrumWidth)
    {
        EyeColor = eyeColor;
        PhiltrumWidth = philtrumWidth;
    }

    public override bool Equals(object obj) => this.Equals(obj as FacialFeatures);
    public bool Equals(FacialFeatures p)
    {
        if (p is null || this.GetType() != p.GetType())
        {
            return false;
        }

        return Object.ReferenceEquals(this, p) || (EyeColor == p.EyeColor && PhiltrumWidth == p.PhiltrumWidth);
    }

     public override int GetHashCode() => HashCode.Combine(EyeColor, PhiltrumWidth);
}

public class Identity
{
    public string Email { get; }
    public FacialFeatures FacialFeatures { get; }

    public Identity(string email, FacialFeatures facialFeatures)
    {
        Email = email;
        FacialFeatures = facialFeatures;
    }

    public override bool Equals(object obj) => this.Equals(obj as Identity);
    public bool Equals(Identity i)
    {
        if (i is null || this.GetType() != i.GetType())
        {
            return false;
        }

        return Object.ReferenceEquals(this, i) || (Email == i.Email && FacialFeatures.Equals(i.FacialFeatures));
    }

    public override int GetHashCode() => HashCode.Combine(Email, FacialFeatures.GetHashCode());
}

public class Authenticator
{
    private HashSet<Identity> registry = new HashSet<Identity>();

    public static bool AreSameFace(FacialFeatures faceA, FacialFeatures faceB)
    {
        return faceA.Equals(faceB);
    }

    public bool IsAdmin(Identity identity)
    {
        var admin = new Identity("admin@exerc.ism", new FacialFeatures("green", 0.9m));
        return admin.Equals(identity);
    }

    public bool Register(Identity identity)
    {
        return registry.Add(identity);
    }

    public bool IsRegistered(Identity identity)
    {
        return registry.Contains(identity);
    }

    public static bool AreSameObject(Identity identityA, Identity identityB)
    {
        return identityA == identityB;
    }
}
