defmodule NameBadge do
  def print(id, name, department) do
    ""
    |> then(fn badge -> if id != nil, do: badge <> "[#{id}] - ", else: badge end)
    |> IO.inspect(label: "Add ID to badge")
    |> Kernel.<>("#{name} - ")
    |> then(fn badge -> if department == nil, do: badge <> "OWNER", else: badge <> String.upcase(department) end)
  end
end
