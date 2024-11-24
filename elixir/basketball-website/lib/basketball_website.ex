defmodule BasketballWebsite do
  def extract_from_path(nil, _path), do: nil
  def extract_from_path(_data, ""), do: nil
  def extract_from_path(data, path) do
    [head | tail] = String.split(path, ".")
    if tail == [], do: data[head], else: extract_from_path(data[head], Enum.join(tail, "."))
  end

  def get_in_path(data, path) do
    get_in(data, String.split(path, "."))
  end
end
