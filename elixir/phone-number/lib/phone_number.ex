defmodule PhoneNumber do
  @doc """
  Remove formatting from a phone number if the given number is valid. Return an error otherwise.
  """
  @spec clean(String.t()) :: {:ok, String.t()} | {:error, String.t()}
  def clean(raw) do
    number = String.replace(raw, ["(", ")", " ", ".", "+", "-", "_"], "", global: true)

    with :ok <- valid_min_length(number), 
         {:ok, number} <- strip_country(number),
         :ok <- valid_length(number),
         :ok <- only_numbers(number),
         :ok <- valid_area_code(number),
         :ok <- valid_exchange_code(number) do
      {:ok, number}
    else
      :short_error -> {:error, "must not be fewer than 10 digits"}
      :country_error -> {:error, "11 digits must start with 1"}
      :long_error -> {:error, "must not be greater than 11 digits"}
      :non_digit_error -> {:error, "must contain digits only"}
      :zero_area_code_error -> {:error, "area code cannot start with zero"}
      :one_area_code_error -> {:error, "area code cannot start with one"}
      :zero_exchange_code_error -> {:error, "exchange code cannot start with zero"}
      :one_exchange_code_error -> {:error, "exchange code cannot start with one"}
    end
  end

  defp valid_min_length(number) do
    if String.length(number) >= 10, do: :ok, else: :short_error
  end

  defp valid_length(number) do
    if String.length(number) < 11, do: :ok, else: :long_error
  end

  defp strip_country(number) do
    cond do
      String.length(number) == 10 -> {:ok, number}
      String.length(number) == 11 and String.at(number, 0) != "1" -> :country_error
      true -> {:ok, String.slice(number, 1..-1//1)}
    end
  end

  defp only_numbers(number) do
    if String.match?(number, ~r/[^\d]/), do: :non_digit_error, else: :ok
  end

  defp valid_area_code("0" <> _), do: :zero_area_code_error
  defp valid_area_code("1" <> _), do: :one_area_code_error
  defp valid_area_code(_), do: :ok

  defp valid_exchange_code(<<_::size(8 * 3), ?0, _::binary>>), do: :zero_exchange_code_error
  defp valid_exchange_code(<<_::size(8 * 3), ?1, _::binary>>), do: :one_exchange_code_error
  defp valid_exchange_code(_), do: :ok
end
