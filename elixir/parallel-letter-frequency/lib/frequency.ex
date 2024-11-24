defmodule Frequency do
  @doc """
  Count letter frequency in parallel.

  Returns a map of characters to frequencies.

  The number of worker processes to use can be set with 'workers'.
  """
  @spec frequency([String.t()], pos_integer) :: %{String.t => pos_integer}
  def frequency(texts, workers) do
    Enum.chunk_every(texts, max(trunc(Enum.count(texts) / workers), 1))
    |> Enum.map(fn text -> Task.async(fn -> count(text) end) end)
    |> Enum.map(&Task.await/1)
    |> Enum.reduce(%{}, fn mapping, acc ->
      Map.merge(acc, mapping, fn _k, v1, v2 -> v1 + v2 end)
    end)
  end

  @spec count([String.t()]) :: %{String.t => pos_integer}
  defp count(text_chunk) do
    Enum.flat_map(text_chunk, &String.graphemes/1)
    |> Enum.reduce(%{}, fn char, acc ->
      if String.match?(char, ~r/\p{L}/), do: Map.update(acc, String.downcase(char), 1, &(&1 + 1)), else: acc
    end)
  end
end
