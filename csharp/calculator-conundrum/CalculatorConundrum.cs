using System;

public static class SimpleCalculator
{
    public static string Calculate(int operand1, int operand2, string operation)
    {
        if (operation == "/" && operand2 == 0) {
            return "Division by zero is not allowed.";
        }

        var res = operation switch {
                "+" => SimpleOperation.Addition(operand1, operand2),
                "*" => SimpleOperation.Multiplication(operand1, operand2),
                "/" => SimpleOperation.Division(operand1, operand2),
                "" => throw new ArgumentException(),
                null => throw new ArgumentNullException(),
                _ => throw new ArgumentOutOfRangeException()
        };

        return $"{operand1} {operation} {operand2} = {res}";
    }
}
