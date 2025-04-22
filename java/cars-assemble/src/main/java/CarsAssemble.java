public class CarsAssemble {
    public double productionRatePerHour(int speed) {
        if (speed < 1) {
            return 0;
        }

        var efficiency = 0.77;
        if (speed < 5) {
            efficiency = 1.0;
        } else if (speed < 9) {
            efficiency = 0.9;
        } else if (speed < 10) {
            efficiency = 0.8;
        }

        return speed * 221 * efficiency;
    }

    public int workingItemsPerMinute(int speed) {
        return (int)productionRatePerHour(speed) / 60;
    }
}
