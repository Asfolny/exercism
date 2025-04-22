public class JedliksToyCar {
    private int meters;
    private int battery = 100;
    
    public static JedliksToyCar buy() {
        return new JedliksToyCar();
    }

    public String distanceDisplay() {
        return String.format("Driven %d meters", meters);
    }

    public String batteryDisplay() {
        if (battery < 1) {
            return "Battery empty";
        }

        return String.format("Battery at %d%%", battery);
    }

    public void drive() {
        if (battery < 1) {
            return;
        }
        meters += 20;
        battery -= 1;
    }
}
