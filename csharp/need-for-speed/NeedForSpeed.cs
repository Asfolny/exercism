using System;

class RemoteControlCar
{
    private int speed;
    private int drainRate;
    private int travel = 0;
    private int battery = 100;
    
    // TODO: define the constructor for the 'RemoteControlCar' class
    public RemoteControlCar(int speed, int batteryDrain)
    {
        this.speed = speed;
        this.drainRate = batteryDrain;
    }

    public bool BatteryDrained() => this.battery < this.drainRate;


    public int DistanceDriven() => this.travel;

    public void Drive()
    {
        if (this.battery >= this.drainRate) {
            this.travel += this.speed;
            this.battery -= this.drainRate;
        }
    }

    public static RemoteControlCar Nitro() => new RemoteControlCar(50, 4);

}

class RaceTrack
{
    private int distance;
    
    public RaceTrack(int distance)
    {
        this.distance = distance;
    }

    public bool TryFinishTrack(RemoteControlCar car)
    {
        while (!car.BatteryDrained() && car.DistanceDriven() < this.distance) {
            car.Drive();
        }

        return car.DistanceDriven() >= this.distance;
    }
}
