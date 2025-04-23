public class ExperimentalRemoteControlCar implements RemoteControlCar {
    private int meters;
    
    public void drive() {
        meters += 20;
    }

    public int getDistanceTravelled() {
        return meters;
    }
}
