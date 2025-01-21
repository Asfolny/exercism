using System;
using System.Linq;

class WeighingMachine
{
    public int Precision {get;}
    private double weight;
    public double Weight
    {
        get { return weight; }
        set {
            if (value < 0) {
                throw new ArgumentOutOfRangeException();
            }
            weight = value;
        }
    }
    public double TareAdjustment {get; set;} = 5.0;
    public string DisplayWeight {
        get {
            var format = "0." + string.Concat(Enumerable.Repeat("0", Precision));
            var adjustedWeight = Math.Round(Weight-TareAdjustment, Precision);
            return $"{adjustedWeight.ToString(format)} kg";
        }
    }

    // TODO: define the 'TareAdjustment' property
    public WeighingMachine(int precision) {
        Precision = precision;
    }
}
