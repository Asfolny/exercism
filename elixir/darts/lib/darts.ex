defmodule Darts do
  @type position :: {number, number}

  @doc """
  Calculate the score of a single dart hitting a target
  """
  @spec score(position) :: integer
  def score({x, y}) do
    point = (x*x + y*y) ** 0.5
    cond do
      point <= 1 -> 10
      point <= 5 -> 5
      point <= 10 -> 1
      true -> 0
    end
  end
end
