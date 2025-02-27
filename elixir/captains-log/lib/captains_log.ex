defmodule CaptainsLog do
  @planetary_classes ["D", "H", "J", "K", "L", "M", "N", "R", "T", "Y"]

  def random_planet_class() do
    Enum.random(@planetary_classes)
  end

  def random_ship_registry_number() do
    # uniform always returns X where 1<= X <= N, N is the input number to uniform
    "NCC-#{Enum.random(1000..9999)}"
  end

  def random_stardate() do
    :rand.uniform * 100.0 + 41000.0
  end

  def format_stardate(stardate) do
    :io_lib.format("~.1f", [stardate])
    |> List.to_string()
  end
end
