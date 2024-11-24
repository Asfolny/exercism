defmodule BoutiqueInventory do
  def sort_by_price(inventory), do:
    Enum.sort_by(inventory, &(&1[:price]), :asc)

  def with_missing_price(inventory), do:
    Enum.filter(inventory, &(&1[:price] == nil))

  def update_names(inventory, old_word, new_word) do
    Enum.map(
      inventory,
      fn item ->
        Map.update(item, :name, "", &(String.replace(&1, old_word, new_word)))
      end
      )
  end

  def increase_quantity(item, count) do
    Map.update(
      item,
      :quantity_by_size,
      %{},
      fn quantity -> Map.new(quantity, fn {k, v} -> {k, v + count} end) end
    )
  end

  def total_quantity(item) do
    Enum.reduce(
      item[:quantity_by_size], 0, fn {_, v}, acc -> (acc + v) end
    )
  end
end
