defmodule RemoteControlCar do
  @enforce_keys [:nickname]
  defstruct [
    :nickname,
    battery_percentage: 100,
    distance_driven_in_meters: 0
  ]

  def new(nickname \\ "none") do
    %RemoteControlCar{nickname: nickname}
  end

  def display_distance(%RemoteControlCar{distance_driven_in_meters: distance}) do
    "#{distance} meters"
  end

  def display_battery(%RemoteControlCar{battery_percentage: 0}) do
    "Battery empty"
  end
  def display_battery(%RemoteControlCar{battery_percentage: battery}) do
    "Battery at #{battery}%"
  end

  def drive(%RemoteControlCar{battery_percentage: 0} = car), do: car
  def drive(%RemoteControlCar{battery_percentage: current_battery, distance_driven_in_meters: current_distance} = car) do
    %{car | distance_driven_in_meters: current_distance + 20}
    |> (&(%{&1 | battery_percentage: current_battery - 1})).()
  end
end
