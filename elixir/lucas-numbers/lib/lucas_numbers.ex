defmodule LucasNumbers do
  @moduledoc """
  Lucas numbers are an infinite sequence of numbers which build progressively
  which hold a strong correlation to the golden ratio (φ or ϕ)

  E.g.: 2, 1, 3, 4, 7, 11, 18, 29, ...
  """
  def generate(count) when not is_number(count) or count < 1, do: raise(ArgumentError, "count must be specified as an integer >= 1")

  def generate(1), do: [2]
  def generate(2), do: [2, 1]

  def generate(count) do
    Stream.iterate({1, 2}, fn {acc, i} -> {acc + i, acc} end)
    |> Enum.take(count - 2)
    |> Enum.map(fn {f, s} -> f + s end)
    |> then(fn list -> [2, 1] ++ list end)
  end
end
