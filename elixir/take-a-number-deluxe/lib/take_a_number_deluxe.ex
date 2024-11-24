defmodule TakeANumberDeluxe do
  use GenServer
  # Client API

  @spec start_link(keyword()) :: {:ok, pid()} | {:error, atom()}
  def start_link(init_arg) do
    GenServer.start_link(__MODULE__, init_arg)
  end

  @spec report_state(pid()) :: TakeANumberDeluxe.State.t()
  def report_state(machine) do
    GenServer.call(machine, :report)
  end

  @spec queue_new_number(pid()) :: {:ok, integer()} | {:error, atom()}
  def queue_new_number(machine) do
    GenServer.call(machine, :try_queue)
  end

  @spec serve_next_queued_number(pid(), integer() | nil) :: {:ok, integer()} | {:error, atom()}
  def serve_next_queued_number(machine, priority_number \\ nil) do
    GenServer.call(machine, {:try_serve_queue, priority_number})
  end

  @spec reset_state(pid()) :: :ok
  def reset_state(machine) do
    GenServer.call(machine, :reset)
  end

  # Server callbacks
  @impl GenServer
  def init(init_arg) do
    init = TakeANumberDeluxe.State.new(init_arg[:min_number], init_arg[:max_number], Keyword.get(init_arg, :auto_shutdown_timeout, :infinity))
    case init do
      {:ok, state} -> {:ok, state, state.auto_shutdown_timeout}
      {:error, error} -> {:error, error}
    end
  end

  @impl GenServer
  def handle_call(message, _from, state) do
    case message do
      :report -> {:reply, state, state, state.auto_shutdown_timeout}
      
      :try_queue ->
        new_number = TakeANumberDeluxe.State.queue_new_number(state)
        case new_number do
          {:ok, number, new_state} -> {:reply, {:ok, number}, new_state, state.auto_shutdown_timeout}
          {:error, _error} -> {:reply, new_number, state, state.auto_shutdown_timeout}
          _ -> {:reply, {:error, "Failed to handle queue_new_number"}, state, state.auto_shutdown_timeout}
        end

      {:try_serve_queue, priority_number} ->
        new_number = TakeANumberDeluxe.State.serve_next_queued_number(state, priority_number)
        case new_number do
          {:ok, number, new_state} -> {:reply, {:ok, number}, new_state, state.auto_shutdown_timeout}
          {:error, _error} -> {:reply, new_number, state, state.auto_shutdown_timeout}
          _ -> {:reply, {:error, "Failed to handle queue_new_number"}, state, state.auto_shutdown_timeout}
        end

      :reset ->
        {:ok, fresh_state} = TakeANumberDeluxe.State.new(state.min_number, state.max_number, state.auto_shutdown_timeout)
        {:reply, :ok, fresh_state, state.auto_shutdown_timeout}
      
      _ -> {:reply, {:error, "message not understood"}, state, state.auto_shutdown_timeout}
    end
  end

  @impl GenServer
  def handle_info(message, state) do
    case message do
      :timeout -> {:stop, :normal, state}
      _ -> {:noreply, state, state.auto_shutdown_timeout}
    end
  end
end
