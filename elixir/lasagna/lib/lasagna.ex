defmodule Lasagna do
  def expected_minutes_in_oven(), do: 40

  def remaining_minutes_in_oven(time_in) do
    expected_minutes_in_oven() - time_in
  end

  def preparation_time_in_minutes(layers), do: layers * 2

  def total_time_in_minutes(layers, time_in) do
    preparation_time_in_minutes(layers) + time_in
  end
  
  def alarm(), do: "Ding!"
end
