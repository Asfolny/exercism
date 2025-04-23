class ProductionRemoteControlCar implements RemoteControlCar, Comparable<ProductionRemoteControlCar> {
    private int meters;
    private int victories;
    
    public void drive() {
        meters += 10;
    }

    public int getDistanceTravelled() {
        return meters;
    }

    public int getNumberOfVictories() {
        return victories;
    }

    public void setNumberOfVictories(int numberOfVictories) {
        victories = numberOfVictories;
    }

    public int compareTo(ProductionRemoteControlCar car) {
        return victories == car.getNumberOfVictories() ? 0 : victories < car.getNumberOfVictories() ? 1 : -1;
    }
}
