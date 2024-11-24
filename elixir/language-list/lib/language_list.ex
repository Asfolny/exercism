defmodule LanguageList do
  def new(), do: []

  def add(list, language), do: [language | list]

  def remove(list) do
    [head | tail] = list
    tail
  end

  def first(list) do
    [head | tail] = list
    head
  end

  def count(list), do: length(list)

  def functional_list?(list), do: "Elixir" in list
end
