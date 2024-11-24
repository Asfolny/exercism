using System;

class BirdCount
{
    private int[] _birdsPerDay;

    public BirdCount(int[] birdsPerDay) => _birdsPerDay = birdsPerDay;

    public static int[] LastWeek() => new[] { 0, 2, 5, 3, 7, 8, 4 };

    public int Today() => _birdsPerDay[_birdsPerDay.Length-1];

    public void IncrementTodaysCount() => 
        _birdsPerDay[_birdsPerDay.Length-1]++;

    public bool HasDayWithoutBirds()
    {
        foreach (int birds in _birdsPerDay) {
            if (birds == 0) {
                return true;
            }
        }

        return false;
    }

    public int CountForFirstDays(int numberOfDays)
    {
        var counter = 0;
        for (int i = 0; i < numberOfDays; i++) {
            counter += _birdsPerDay[i];
        }

        return counter;
    }

    public int BusyDays()
    {
        var busyDays = 0;

        foreach (int birds in _birdsPerDay) {
            if (birds >= 5) {
                busyDays++;
            }
        }
        
        return busyDays;
    }
}
