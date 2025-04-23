class NeedForSpeed {
    private int speed;
    private int batteryDrain;
    private int battery = 100;
    private int meters;

    NeedForSpeed(int speed, int batteryDrain) {
        this.speed = speed;
        this.batteryDrain = batteryDrain;
    }

    public boolean batteryDrained() {
        return battery < batteryDrain;
    }

    public int distanceDriven() {
        return meters;
    }

    public void drive() {
        if (this.batteryDrained()) {
            return;
        }
        meters += speed;
        battery -= batteryDrain;
    }

    public boolean canDrive(int range) {
        return range <= speed * (100 / batteryDrain);
    }

    public static NeedForSpeed nitro() {
        return new NeedForSpeed(50, 4);
    }
}

class RaceTrack {
    private int distance;
    
    RaceTrack(int distance) {
        this.distance = distance;
    }

    public boolean canFinishRace(NeedForSpeed car) {
        return car.canDrive(distance);
    }
}
