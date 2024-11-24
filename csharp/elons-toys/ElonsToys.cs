using System;

class RemoteControlCar
{
    private int _battery = 100;
    private int _distanceDriven;

    public static RemoteControlCar Buy() => new RemoteControlCar();

    public string DistanceDisplay() => $"Driven {_distanceDriven} meters";

    public string BatteryDisplay() => 
        _battery > 0 ? $"Battery at {_battery}%" : "Battery empty";

    public void Drive()
    {
        if (_battery > 0) {
            _distanceDriven += 20;
            _battery -= 1;
        }
    }
}
