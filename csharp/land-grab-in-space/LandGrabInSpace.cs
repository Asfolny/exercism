using System;
using System.Linq;
using System.Collections.Generic;

public struct Coord
{
    public Coord(ushort x, ushort y)
    {
        X = x;
        Y = y;
    }

    public ushort X { get; }
    public ushort Y { get; }
}

public struct Plot
{
    public Plot(Coord c1, Coord c2, Coord c3, Coord c4)
    {
        C1 = c1;
        C2 = c2;
        C3 = c3;
        C4 = c4;
    }

    public Coord C1 { get; }
    public Coord C2 { get; }
    public Coord C3 { get; }
    public Coord C4 { get; }

    public double MaxVertice()
    {
        return Math.Max(
            Math.Max(MaxSide1(), MaxSide2()),
            Math.Max(MaxSide3(), MaxSide4())
        );
    }

    private double MaxSide1()
    {
        return Math.Max(
            Math.Max(
                Math.Sqrt(Math.Pow((C1.X - C4.X), 2) + Math.Pow((C1.Y - C4.Y), 2)),
                Math.Sqrt(Math.Pow((C1.X - C2.X), 2) + Math.Pow((C1.Y - C2.Y), 2))
            ),
            Math.Max(
                Math.Sqrt(Math.Pow((C1.X - C4.X), 2) + Math.Pow((C1.Y - C4.Y), 2)),
                Math.Sqrt(Math.Pow((C1.X - C2.X), 2) + Math.Pow((C1.Y - C2.Y), 2))
            )
        );
    }

    private double MaxSide2()
    {
        return Math.Max(
            Math.Max(
                Math.Sqrt(Math.Pow((C2.X - C1.X), 2) + Math.Pow((C2.Y - C1.Y), 2)),
                Math.Sqrt(Math.Pow((C2.X - C3.X), 2) + Math.Pow((C2.Y - C3.Y), 2))
            ),
            Math.Max(
                Math.Sqrt(Math.Pow((C2.X - C1.X), 2) + Math.Pow((C2.Y - C1.Y), 2)),
                Math.Sqrt(Math.Pow((C2.X - C3.X), 2) + Math.Pow((C2.Y - C3.Y), 2))
            )
        );
    }

    private double MaxSide3()
    {
        return Math.Max(
            Math.Max(
                Math.Sqrt(Math.Pow((C3.X - C2.X), 2) + Math.Pow((C3.Y - C2.Y), 2)),
                Math.Sqrt(Math.Pow((C3.X - C4.X), 2) + Math.Pow((C3.Y - C4.Y), 2))
            ),
            Math.Max(
                Math.Sqrt(Math.Pow((C3.X - C2.X), 2) + Math.Pow((C3.Y - C2.Y), 2)),
                Math.Sqrt(Math.Pow((C3.X - C4.X), 2) + Math.Pow((C3.Y - C4.Y), 2))
            )
        );
    }

    private double MaxSide4()
    {
        return Math.Max(
            Math.Max(
                Math.Sqrt(Math.Pow((C4.X - C3.X), 2) + Math.Pow((C4.Y - C3.Y), 2)),
                Math.Sqrt(Math.Pow((C4.X - C1.X), 2) + Math.Pow((C4.Y - C1.Y), 2))
            ),
            Math.Max(
                Math.Sqrt(Math.Pow((C4.X - C3.X), 2) + Math.Pow((C4.Y - C3.Y), 2)),
                Math.Sqrt(Math.Pow((C4.X - C1.X), 2) + Math.Pow((C4.Y - C1.Y), 2))
            )
        );
    }
}


public class ClaimsHandler
{
    private HashSet<Plot> claims = new HashSet<Plot>();
    private int lastHash;
    
    public void StakeClaim(Plot plot)
    {
        claims.Add(plot);
        lastHash = plot.GetHashCode();
    }

    public bool IsClaimStaked(Plot plot)
    {
        return claims.Contains(plot);
    }

    public bool IsLastClaim(Plot plot)
    {
        return plot.GetHashCode() == lastHash;
    }

    public Plot GetClaimWithLongestSide()
    {
        return claims.MaxBy(plot => plot.MaxVertice());
    }
}
