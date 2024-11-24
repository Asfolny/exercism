# Use the Plot struct as it is provided
defmodule Plot do
  @enforce_keys [:plot_id, :registered_to]
  defstruct [:plot_id, :registered_to]
end

defmodule CommunityGarden do
  def start(opts \\ []) do
    Agent.start(fn -> %{opts: opts, next_id: 1, plots: []} end)
  end

  def list_registrations(pid) do
    Agent.get(pid, fn state -> state[:plots] end)
  end

  def register(pid, register_to) do
    id = Agent.get_and_update(pid, fn state -> {state[:next_id], Map.update!(state, :next_id, &(&1 +1))} end)
    %Plot{
      plot_id: id,
      registered_to: register_to
    }
    |> tap(fn plot ->
      Agent.update(pid, fn state ->
        Map.update!(state, :plots, fn plots -> [plot | plots] end)
      end)
    end)
  end

  def release(pid, plot_id) do
    Agent.update(pid, fn state
      -> Map.update!(state, :plots, &(Enum.reject(&1, fn plot -> plot.plot_id == plot_id end)))
    end)
  end

  def get_registration(pid, plot_id) do
    Agent.get(pid, fn state -> Enum.find(state[:plots], {:not_found, "plot is unregistered"}, &(&1.plot_id == plot_id)) end)
  end
end
