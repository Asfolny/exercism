defmodule BirdCount do
  def today([]), do: nil
  def today(list) do
    [head | _] = list
    head
  end
  
  def increment_day_count([]), do: [1]
  def increment_day_count(list) do
    [today | tail] = list
    [today+1 | tail]
  end

  def has_day_without_birds?([]), do: false
  def has_day_without_birds?(list) do
    [day | tail] = list
    cond do 
      day == 0 -> true
      true -> has_day_without_birds?(tail)
    end
  end

  def total([]), do: 0
  def total(list) do
    [head | tail] = list
    total(tail) + head
  end

  def busy_days([]), do: 0
  def busy_days(list) do
    [head | tail] = list
    cond do
      head >= 5 -> busy_days(tail) + 1
      true -> busy_days(tail)
    end
  end
end
