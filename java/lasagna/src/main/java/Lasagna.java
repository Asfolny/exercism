public class Lasagna {

    public int expectedMinutesInOven() {
        return 40;
    }

    public int remainingMinutesInOven(int inOven) {
        return expectedMinutesInOven() - inOven;
    }

    public int preparationTimeInMinutes(int layers) {
        return layers * 2;
    }

    public int totalTimeInMinutes(int layers, int inOven) {
        return preparationTimeInMinutes(layers) + inOven;
    }
}
