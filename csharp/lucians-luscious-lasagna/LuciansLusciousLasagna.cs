class Lasagna
{
    public int ExpectedMinutesInOven() => 40;

    public int RemainingMinutesInOven(int timeIn) => 
        this.ExpectedMinutesInOven() - timeIn;

    public int PreparationTimeInMinutes(int layers) => layers * 2;

    public int ElapsedTimeInMinutes(int layers, int timeIn) => 
        this.PreparationTimeInMinutes(layers) + timeIn;
}
