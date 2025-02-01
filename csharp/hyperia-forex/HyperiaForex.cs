using System;

public struct CurrencyAmount
{
    private decimal amount;
    private string currency;

    public CurrencyAmount(decimal amount, string currency)
    {
        this.amount = amount;
        this.currency = currency;
    }

    public static bool operator ==(CurrencyAmount a, CurrencyAmount b)
        => a.currency.Equals(b.currency) ?
            a.amount == b.amount :
            throw new ArgumentException("different curency");

    public static bool operator !=(CurrencyAmount a, CurrencyAmount b)
        => a.currency.Equals(b.currency) ?
            a.amount != b.amount :
            throw new ArgumentException("different curency");

    public static bool operator >(CurrencyAmount a, CurrencyAmount b)
        => a.currency.Equals(b.currency) ?
            a.amount > b.amount :
            throw new ArgumentException("different curency");

    public static bool operator <(CurrencyAmount a, CurrencyAmount b)
        => a.currency.Equals(b.currency) ?
            a.amount < b.amount :
            throw new ArgumentException("different curency");

    public static CurrencyAmount operator +(CurrencyAmount a, CurrencyAmount b)
    {
        if (a.currency.Equals(b.currency) == false)
        {
            throw new ArgumentException("different curency");
        }

        return new CurrencyAmount{amount = a.amount + b.amount, currency = a.currency};
    }
            

    public static CurrencyAmount operator -(CurrencyAmount a, CurrencyAmount b)
    {
        if (a.currency.Equals(b.currency) == false)
        {
            throw new ArgumentException("different curency");
        }

        return new CurrencyAmount{amount = a.amount - b.amount, currency = a.currency};
    }

    public static explicit operator double(CurrencyAmount ca) => (double)ca.amount;
    public static implicit operator decimal(CurrencyAmount ca) => ca.amount;
}