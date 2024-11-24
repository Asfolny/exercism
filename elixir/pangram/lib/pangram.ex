defmodule Pangram do
  @doc """
  Determines if a word or sentence is a pangram.
  A pangram is a sentence using every letter of the alphabet at least once.

  Returns a boolean.

    ## Examples

      iex> Pangram.pangram?("the quick brown fox jumps over the lazy dog")
      true

  """

  @spec pangram?(String.t()) :: boolean
  def pangram?(sentence) do
    alphabet = Enum.into(97..122, [], &(<<&1>>))
    sentence
    |> String.downcase()
    |> String.codepoints()
    |> Enum.uniq()
    |> Enum.filter(fn char -> char in alphabet end)
    |> Enum.sort()
    |> then(fn charlist -> charlist == alphabet end)
  end
end
